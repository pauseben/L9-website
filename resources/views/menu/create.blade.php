@extends('layouts.admin', ['title' => 'Új menü létrehozás'])
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Új menü létrehozás</h2>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
    <div class="col-6 mb-4">
       <div class="card border-0 shadow">
          <div class="card-body">
<form action="{{ route('menu.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Név</strong>
                <input type="text" id="name" name="name" class="form-control" >
            </div>
        </div>
        <div class="form-group custom-dropdown mb-2">
            <label for="status">Státusz:</label>
            <select name="status" class="form-select">
                <option value="1" selected="">Aktív</option>
                <option value="0">Inaktív</option>
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-2">
                <button type="submit" class="btn btn-primary mt-2 animate-up-2">Mentés</button>
                <a class="btn btn-secondary mt-2 animate-up-2" href="{{ route('menu.index') }}"> Vissza</a>
        </div>
    </div>
   
</form>
</div></div></div></div>

@endsection