@extends('layouts.admin', ['title' => 'Felhasználók'])
@section('content')
<div class="d-flex justify-content-between w-100 flex-wrap mb-4">
  <div class="mb-3 mb-lg-0">
      <h1 class="h4">Felhasználók</h1>
  </div>
  <div>
  </div>
</div>
<div class="card border-0 shadow mb-4">
  <div class="card-body">
      <div class="table-responsive">
          <table id="UserList" class="table table-centered  table-nowrap mb-0 rounded">
              <thead class="thead-light">
                  <tr>
                      <th class="border-0 rounded-start">Role</th>
                      <th class="border-0">Name</th>
                      <th class="border-0">E-mail</th>
                      <th class="border-0 rounded-end">Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <!-- Item -->
                  <tr>
                      <td >{{ $user->getRoleNames()[0] }} </td>
                      <td >{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td class="text-success">
                          <div class="d-flex align-items-center">
                            @if($user->id != auth()->user()->id and $user->id != 3)
                                @can('users.edit')
                                    <a class="btn btn-info mx-1" href="{{ route('edit.user', $user->id) }}">Szerkesztés</a>
                                @endcan
                                @if( Auth::user()->hasRole('Super-Admin') )
                                <a class="btn btn-gray-200 mx-1" href="{{ route('impersonate', $user->id) }}">Átjelentkezés</a>
                                @endif
                           @endif
                           @can('users.destroy')
                            @if($user->id != 3)
                            <form id="deleteUser{{ $user->id }}" action="{{ route('users.destroy',$user->id) }}" method="POST" class="m-0 p-0">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger show-alert-delete-box mx-1" onclick="areYouSure({{ $user->id }});">Töröl</button>
                              </form>
                              @endif
                            @endcan
                          </div>
                      </td>
                  </tr>
                  <!-- End of Item -->
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
</div>
<a href="/logs" class="btn btn-outline-gray-500 ">Felhasználó logok</a>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {
      $('#UserList').DataTable();
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
               $("#deleteUser"+id).submit(); // Submit the form
           }
       })
   }
</script>


@endsection