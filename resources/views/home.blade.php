@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <p>További menüpontok:</p>
                        <ul>
                            <li><a href="/my-orders">Rendeléseim</a></li>
                            <li><a href="/users/profile">Adataim</a></li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
