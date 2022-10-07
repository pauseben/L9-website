@extends('layouts.default', ['title' => 'Profil szerkesztés'])
@section('content')
<div class="container">
<div class="row">
    <div class="col-12">
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">Adataim szerkesztése</h2>
            <form method="post" action="{{route('users.update', auth()->user())}}">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label for="name">Név</label>
                            <input id="name" name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label for="email">E-mail cím</label>
                            <input id="email" name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            placeholder="{{ __('Email address') }}" value="{{ old('email', auth()->user()->email) }}" required="">
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="current_password">Jelenlegi jelszó</label>
                            <input id="current_password" name="current_password" type="password" class="form-control" placeholder="Csak változás esetén szükséges megadni!">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <label for="password">Új jelszó</label>
                            <input id="password" name="password" type="password" class="form-control" placeholder="Csak változás esetén szükséges megadni!">
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <label for="password_confirmation">Új jelszó újra</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="role" value="{{ Auth::user()->roles->pluck('name')[0] }}" />


                <div class="mt-3">
                    <button class="btn btn-selfProject-primary" type="submit">Mentés</button>
                </div>

            </form>
        </div>
    </div>
</div>
</div>
@stop