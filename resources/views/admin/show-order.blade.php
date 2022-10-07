@extends('layouts.admin', ['title' => 'Megtekintés'])
  
@section('content')
<div class="container">
    <div class="row">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">#{{ $order->id }} számú rendelés</span>
        </h4>
        @foreach ($products as $product)                     
            @for ($i = 0; $i < count($order->datum); $i++)
                @if ($product->datum == $order->datum[$i])
                    
                        @if($order->leves[$i] != "")
                        <ul class="col-md-4 list-group mb-3">
                            <h5 class="">{{ $order->datum[$i] }}</h5>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Leves</h6>
                                    <small class="text-muted">{{ getFoodName($order->datum[$i],'leves') }}</small>
                                </div>
                                <span class="text-muted">{{ $order->leves[$i] }} db</span>
                            </li>
                        @endif
                        @if($order->a_menu[$i] != "")
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">A menü</h6>
                                    <small class="text-muted">{{ getFoodName($order->datum[$i],'a_menu') }}</small>
                                </div>
                                <span class="text-muted">{{ $order->a_menu[$i] }} db</span>
                            </li>
                        @endif
                        @if($order->b_menu[$i] != "")
                            <li class="list-group-item d-flex justify-content-between lh-sm">
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
        <hr>
        <h4>Megrendelő adatai:</h4>
        <p>Név: {{ $order->name }}</p>
        <p>E-mail: {{ $order->email }}</p>
        <p>Telefonszám: {{ $order->phone }}</p>
        <p>Rendelés dátuma: {{ date('Y.m.d. H:i',strtotime($order->created_at)) }}</p>
    </div>
</div>
@endsection