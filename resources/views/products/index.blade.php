@extends('layouts.admin', ['title' => 'Termékek'])
@section('content')

<div class="py-4">
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
        <h4>Ételek</h4>
    </div>
    <div>
        @can('products.create')
        <a href="{{ route('products.create') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Új étel
        </a>
        @endcan
        </div>
    </div>
</div>
<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="ProductsList" class="table table-centered  table-nowrap mb-0 rounded">
                <thead class="thead-light">
                <tr>
                    <th>Dátum</th>
                    <th>Leves</th>
                    <th>A menu</th>
                    <th>B menu</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->datum }}</td>
                    <td>{{ $product->leves }}</td>
                    <td>{{ $product->a_menu }}</td>
                    <td>{{ $product->b_menu }}</td>
                    <td>
                        <form id="deleteProductForm{{ $product->id }}" action="{{ route('products.destroy',$product->id) }}" method="POST">
            
                            <a class="btn btn-info" href="{{ route('products.edit',$product->id) }}">Szerkeszt</a>
        
                            @csrf
                            @method('DELETE')
            
                            <button type="button" class="btn btn-danger show-alert-delete-box" onclick="areYouSure({{ $product->id }});">Törlés</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
   $(document).ready( function () {
      $('#ProductsList').DataTable({       
        order: [[0, 'desc']],
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/hu.json"
   },                      
   });  
   } );
</script>
<script type="text/javascript">
    function areYouSure(id)
    {
        Swal.fire({
            title: 'Biztos törölni szeretné?',
            showDenyButton: true,
            confirmButtonText: 'Igen',
            denyButtonText: `Nem`,
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('Törlés folyamatban!', '', 'info')
                $("#deleteProductForm"+id).submit(); // Submit the form
            }
        })
    }
</script>
@endsection