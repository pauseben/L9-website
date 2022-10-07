@extends('layouts.default', ['title' => 'Rendeléseim'])
@section('content')
<div class="container">
<div class="py-4">
    <div class="d-flex justify-content-between w-100 flex-wrap">
       <div class="mb-3 mb-lg-0">
          <h1 class="h4">Rendeléseim</h1>
       </div>
    </div>
 </div>
@if($orders->isNotEmpty())


 <div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="OrdersList" class="table table-centered  table-nowrap mb-0 rounded">
                <thead class="thead-light">
                <tr>
                   <th class="border-0 rounded-start">Rendelés szám</th>
                   <th class="border-0">Mikor?</th>
                   <th class="border-0">További adatok</th>
                </tr>
             </thead>
             <tbody>
                @foreach ($orders as $order)
                @if($order->user_id == auth()->user()->id )
                <tr>
                   <td>{{$order->id}}</td>
                   <td>{{$order->created_at}}</td>
                   <td><div class="col-lg-4">
                    <!-- Button Modal -->
                    <button type="button" class="btn btn-selfProject-primary" data-bs-toggle="modal" data-bs-target="#modal-order-{{ $order->id }}">Mutat</button>
                    <!-- Modal Content -->
                    <div class="modal fade" id="modal-order-{{ $order->id }}" tabindex="-1" aria-labelledby="modal-order-{{ $order->id }}" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-tertiary modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content bg-dark text-white">
                                <div class="modal-header">
                                    <h4># {{ $order->id }} számú rendelés adatai</h4>
                                    <button type="button" class="btn-close btn-close-white text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="row modal-body  py-3">
                                    
                                    @foreach ($products as $product)                     
                                        @for ($i = 0; $i < count($order->datum); $i++)
                                            @if ($product->datum == $order->datum[$i])
                                                    @if($order->leves[$i] != "")
                                                    <ul class="col-md-4 list-group mb-3">
                                                        <h5 class="">{{ $order->datum[$i] }}</h5>
                                                        <li class="list-group-item d-flex justify-content-between lh-sm h-100">
                                                            <div>
                                                                <h6 class="my-0">Leves</h6>
                                                                <small class="text-muted">{{ getFoodName($order->datum[$i],'leves') }}</small>
                                                            </div>
                                                            <span class="text-muted">{{ $order->leves[$i] }} db</span>
                                                        </li>
                                                    @endif
                                                    @if($order->a_menu[$i] != "")
                                                        <li class="list-group-item d-flex justify-content-between lh-sm h-100">
                                                            <div>
                                                                <h6 class="my-0">A menü</h6>
                                                                <small class="text-muted">{{ getFoodName($order->datum[$i],'a_menu') }}</small>
                                                            </div>
                                                            <span class="text-muted">{{ $order->a_menu[$i] }} db</span>
                                                        </li>
                                                    @endif
                                                    @if($order->b_menu[$i] != "")
                                                        <li class="list-group-item d-flex justify-content-between lh-sm h-100">
                                                            <div>
                                                                <h6 class="my-0">B menü</h6>
                                                                <small class="text-muted">{{ getFoodName($order->datum[$i],'b_menu') }}</small>
                                                            </div>
                                                            <span class="text-muted">{{ $order->b_menu[$i] }} db</span>
                                                        </li>
                                                    </ul>
                                                    @endif
                                                @endif
                                        @endfor
                                    @endforeach
                                    <div class="col-md-12">
                                        <h4>További adatok:</h4>
                                        <p>Név: {{ $order->name }}</p>
                                        <p>E-mail: {{ $order->email }}</p>
                                        <p>Telefonszám: {{ $order->phone }}</p>
                                        <p>Rendelés leadás dátuma: {{ $order->created_at }}</p>
                                    </div>

                            </div>
                        </div>
                    </div>
                    <!-- End of Modal Content -->
                </div></td>
                </tr>
                @endif
                @endforeach
             </tbody>
          </table>
       </div>
    </div>
 </div>
 @else
 Nincs leadott ételrendelés!
 @endif
</div>
@stop