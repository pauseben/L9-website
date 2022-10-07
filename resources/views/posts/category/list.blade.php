@extends('layouts.admin', ['title' => 'Post Kategória'])
@section('content')
<div class="py-4">
   <div class="d-flex justify-content-between w-100 flex-wrap">
      <div class="mb-3 mb-lg-0">
         <h4>Bejegyzés kategóriák</h4>
      </div>
      <div>
         @can('category.create')
         <a href="{{ route('category.create') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Új kategória
        </a>
        @endcan
      </div>
   </div>
</div>
<div class="card border-0 shadow mb-4">
   <div class="card-body">
       <div class="table-responsive">
           <table id="PostsList" class="table table-centered  table-nowrap mb-0 rounded">
               <thead class="thead-light">
               <tr>
                  <th class="border-0 rounded-start">Név</th>
                  <th class="border-0 rounded-end" width="280px">Művelet</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($categories as $category)
               <tr>
                  <td>{{ $category->name }}</td>
                  <td>
                  <form id="deleteCategory{{ $category->id }}" action="{{ route('category.destroy',$category->id) }}" method="POST">
                     @csrf
                     @method('DELETE')
                     @can('category.edit')
                        <a class="btn btn-info" href="{{ route('category.edit',$category->id) }}">Szerkesztés</a>
                     @endcan
                     @if($category->id != 3)
                     @can('category.destroy')
                        <button type="button" class="btn btn-danger show-alert-delete-box" onclick="areYouSure({{ $category->id }});">Törlés</button>
                     @endcan
                     @endif
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
      $('#PostsList').DataTable({          
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
               $("#deleteCategory"+id).submit(); // Submit the form
           }
       })
   }
</script>
@endsection