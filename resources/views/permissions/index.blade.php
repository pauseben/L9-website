@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between w-100 flex-wrap mb-4">
    <div class="mb-3 mb-lg-0">
        <h1 class="h4">Permissions</h1>
    </div>
    <div>
        <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
           <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
           Add permission
       </a>
     </div>
  </div>

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
        <table id="PermissionsList" class="table  table-centered table-nowrap mb-0 rounded">
            <thead class="thead-light">
                <tr>
                    <th class="border-0 rounded-start">Name</th>
                    <th class="border-0">Guard</th>
                    <th class="border-0">etc</th>
                    <th class="border-0 rounded-end">etc</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                        <td><a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info btn-sm">Szerkesztés</a></td>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Törlés', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
          $('#PermissionsList').DataTable();
      } );
    </script>
@endsection