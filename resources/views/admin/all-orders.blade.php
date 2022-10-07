@extends('layouts.admin')
@section('content')
<div class="py-4">
    <div class="d-flex justify-content-between w-100 flex-wrap">
       <div class="mb-3 mb-lg-0">
          <h1 class="h4">Rendelések</h1>
       </div>
    </div>
 </div>
 <div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="OrdersList" class="table table-centered  table-nowrap mb-0 rounded">
                <thead class="thead-light">
                <tr>
                   <th class="border-0 rounded-start">#</th>
                   <th class="border-0">Felhasználó</th>
                   <th class="border-0">Mikor?</th>
                   <th class="border-0 rounded-end"  width="280px">Művelet</th>
                </tr>
             </thead>
             <tbody>
                @foreach ($orders as $order)
                <tr>
                   <td>{{$order->id}}</td>
                   <td>{{getUsername($order->user_id)}}</td>
                   <td>{{date('Y.m.d. H:i',strtotime($order->created_at))}}</td>
                   <td>
                    @can('orders.show')
                        <a href="/orders/{{ $order->id }}" class="btn btn-primary">Mutat</a>
                    @endcan
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
      $('#OrdersList').DataTable({          
   "language": {
      "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/hu.json"
   },                      
   });  
   } );
</script>
 

@stop