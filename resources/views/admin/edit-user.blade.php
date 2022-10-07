@extends('layouts.admin', ['title' => 'Felhasználó szerkesztés'])
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">{{ $user->name }} felhasználó adatok szerkesztése</h2>
            <form method="post" action="{{route('users.update', $user)}}">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label for="name">Név</label>
                            <input id="name" name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            placeholder="{{ __('Name') }}" value="{{ old('name', $user->name) }}" required="">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label for="email">E-mail cím</label>
                            <input id="email" name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            placeholder="{{ __('Email address') }}" value="{{ old('email', $user->email) }}" required="">
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

                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control" 
                        name="role" required>
                        <option value="">Select role</option>
                        @foreach($all_roles_in_database as $role)
                            @if ($role->id != 3)
                            <option value="{{ $role->id }}"
                                {{ in_array($role->name, $user->roles->pluck('name')->toArray()) 
                                    ? 'selected'
                                    : '' }}>{{ $role->name }}</option>
                            @endif
                            
                        @endforeach
                    </select>
                    @if ($errors->has('role'))
                        <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                    @endif
                </div>

                <div class="mt-3">
                    <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Mentés</button>
                    <a href="{{ route('users.list') }}" class="btn btn-warning mt-2 animate-up-2">Vissza</a>
                </div>

            </form>
        </div>
    </div>
</div>

@stop