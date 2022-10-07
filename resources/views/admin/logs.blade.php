@extends('layouts.admin', ['title' => 'Logok'])
  
@section('content')
<div class="container">
    <div class="row">
    </div>
    <div class="card border-0 shadow mb-4">
      <div class="card-body">
          <div class="table-responsive">
              <table id="LogsList" class="table table-centered  table-nowrap mb-0 rounded">
                  <thead class="thead-light">
                      <tr>
                          <th class="border-0 rounded-start">Dátum</th>
                          <th class="border-0">Felhasználó</th>
                          <th class="border-0">Leírás</th>
                      </tr>
                  </thead>
                  <tbody>
            @foreach ($logs as $log)
            <tr>
               <td>{{ $log->created_at}}</td>
               <td>{{ getUsername($log->causer_id) }}</td>
               <td>{{ $log->description}}</td>
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
  $('#LogsList').DataTable({
    order: [[0, 'desc']],
   "language": {
      "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/hu.json"
   }
  });
} );
</script>

@endsection