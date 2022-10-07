@extends('layouts.admin')
@section('content')
<div class="">
    <div class="py-4">
        <div class="d-flex justify-content-between w-100 flex-wrap">
           <div class="mb-3 mb-lg-0">
              <h1 class="h4">Admin Dashboard </h1>
           </div>
        </div>
     </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4 col-xs-12 mb-2">    
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                                <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">Felhasználók</h2>
                                <h3 class="fw-extrabold mb-1">{{ $usersCount }} db</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Felhasználók</h2>
                                <h3 class="fw-extrabold mb-2">{{ $usersCount }} db</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-12 mb-2">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                                <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="fw-extrabold h5">Rendelések</h2>
                                <h3 class="mb-1">{{ $ordersCount }} db</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Rendelések</h2>
                                <h3 class="fw-extrabold mb-2">{{ $ordersCount }} db</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-12 mb-2">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                                <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"/>
                                </svg>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="fw-extrabold h5">Fájlkezelő</h2>
                                <h3 class="mb-1">{{ $forder_size }}</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Fájlkezelő</h2>
                                <h3 class="fw-extrabold mb-2">{{ $forder_size }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-6 col-xs-12  mb-4">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="fs-5 fw-bold mb-0">Utoljára regisztráltak</h2>
                        </div>
                        <div class="col text-end">
                            <a href="/users/list" class="btn btn-sm btn-primary">Összes</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th class="border-bottom" scope="col">Név</th>
                            <th class="border-bottom" scope="col">Dátum</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th class="text-gray-900" scope="row">
                                {{ $user->name }}
                            </th>
                            <td class="fw-bolder text-gray-500">
                                {{ date('Y.m.d. H:i',strtotime($user->created_at)) }}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12  mb-4">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="fs-5 fw-bold mb-0">Legfrisebb rendelések</h2>
                        </div>
                        <div class="col text-end">
                            <a href="/orders" class="btn btn-sm btn-primary">Összes</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th class="border-bottom" scope="col">#</th>
                            <th class="border-bottom" scope="col">Név</th>
                            <th class="border-bottom" scope="col">E-mail</th>
                            <th class="border-bottom" scope="col">Dátum</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                        
                        <tr>
                            <th class="" scope="row">
                                <a href="/orders/{{ $order->id }}"><u>  {{ $order->id }} </u></a>
                            </th>
                            <th class="text-gray-900" scope="row">
                                {{ $order->name }}
                            </th>
                            <td class="fw-bolder text-gray-500">
                                {{ $order->email }}
                            </td>
                            <td class="fw-bolder text-gray-500">
                                {{ date('Y.m.d. H:i',strtotime($order->created_at)) }}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div>
        <h5>Állapot: Bejelentkezve</h5>
            Jogosultsági szint:
            @if( auth()->user()->getRoleNames()[0] == 'Super-Admin' )
                <span style="background:goldenrod;padding:5px;color:rgb(82, 23, 82)">Super-Admin</span>
            @elseif( auth()->user()->getRoleNames()[0] == 'admin' )
                <span style="background:rgb(24, 116, 202);padding:5px;color:white">admin</span>
            @elseif( auth()->user()->getRoleNames()[0] == 'user' )
                <span style="background:aqua;padding:5px;color:black">user</span>
            @else
                <span style="background:red;padding:5px;color:black">Nem található! Keresse fel az admint!</span>
            @endif
    </div>
   </div>
@stop