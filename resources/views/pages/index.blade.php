@extends('layouts.admin', ['title' => 'Oldalak'])

@section('content')
<div class="py-4">
   <div class="d-flex justify-content-between w-100 flex-wrap">
      <div class="mb-3 mb-lg-0">
         <h1 class="h4">Oldalak</h1>
      </div>
      <div>
         @can('pages.create')
         <a href="{{ route('pages.create') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Új oldal
        </a>
        @endcan
      </div>
   </div>
</div>
<div class="card border-0 shadow mb-4">
   <div class="card-body">
       <div class="table-responsive">
           <table id="PageList" class="table table-centered  table-nowrap mb-0 rounded">
               <thead class="thead-light">
               <tr>
                  <th class="border-0 rounded-start">Státusz</th>
                  <th class="border-0">Cím</th>
                  {{--<th class="border-0">Szerző</th>
                  <th class="border-0">Létrehozva</th>
                  <th class="border-0">Módosította</th>
                  <th class="border-0">Módosítva</th> --}}
                  <th class="border-0 rounded-end"  width="280px">Művelet</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($pages as $page)
               <tr>
                  <td>{{ ($page->status == 1)? 'Aktív' : 'Vázlat' }}</td>
                  <td>{{ $page->title }}</td>
                  {{--<td>{{ getUsername($page->author) }}</td>
                  <td>{{ $page->created_at }}</td>
                  <td>{{ ($page->modifier != NULL) ? getUsername($page->modifier) : '-' }}</td>
                  <td>{{ $page->updated_at }}</td> --}}
                  <td>
                     <form id="deletePage{{ $page->id }}" action="{{ route('pages.destroy',$page->id) }}" method="POST">
                        @can('pages.show')
                           <a href="/pages/{{ $page->slug }}" target="_blank" class="btn btn-primary">Mutat</a>
                        @endcan
                        @can('pages.edit')
                           <a href="{{ route('pages.edit',$page->id) }}" class="btn btn-info">Szerkeszt</a>
                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('pages.destroy')
                           <button type="button" class="btn btn-danger show-alert-delete-box" onclick="areYouSure({{ $page->id }});">Töröl</button>
                        @endcan
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
      $('#PageList').DataTable({          
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
               $("#deletePage"+id).submit(); // Submit the form
           }
       })
   }
</script>
@endsection
