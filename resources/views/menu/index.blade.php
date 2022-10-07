@extends('layouts.admin', ['title' => 'Menü'])
@section('content')
<div class="py-4">
   <div class="d-flex justify-content-between w-100 flex-wrap">
      <div class="mb-3 mb-lg-0">
         <h1 class="h4">Menü</h1>
      </div>
      <div>
         @can('menu.create')
         <a href="{{ route('menu.create') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Új menü
        </a>
        @endcan
      </div>
   </div>
</div>
<div class="card border-0 shadow mb-4">
   <div class="card-body">
       <div class="table-responsive">
           <table id="MenuList" class="table table-centered  table-nowrap mb-0 rounded">
               <thead class="thead-light">
               <tr>
                  <th class="border-0 rounded-start">#</th>
                  <th class="border-0">Név</th>
                  <th class="border-0">Státusz</th>
                  <th class="border-0 rounded-end"  width="280px">Művelet</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($menus as $menu)
               <tr>
                  <td>{{ $menu->id }}</td>
                  <td>{{ $menu->name }}</td>
                  <td>{{ ($menu->status == 1)? 'Aktív' : 'Inaktív' }}</td>
                  <td>
                     <form id="deleteMenu{{ $menu->id }}" action="{{ route('menu.destroy',$menu->id) }}" method="POST">
                        @can('menu.edit')
                           <a href="{{ route('menu.edit',$menu->id) }}" class="btn btn-info" >Szerkeszt</a>
                        @endcan
                        @csrf
                        @method('DELETE')
                        @if($menu->id != 1)
                        @can('menu.destroy')
                           <button type="button" class="btn btn-danger show-alert-delete-box" onclick="areYouSure({{ $menu->id }});">Töröl</button>
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
      $('#MenuList').DataTable({          
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
               $("#deleteMenu"+id).submit(); // Submit the form
           }
       })
   }
</script>
@endsection