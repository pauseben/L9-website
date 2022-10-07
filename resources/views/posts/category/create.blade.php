@extends('layouts.admin', ['title' => 'Új kategória létrehozás'])
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Új kategória</h4>
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
    </div>
</div>
<div class="row">
    <div class="col-6 mb-4">
       <div class="card border-0 shadow">
          <div class="card-body">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf        
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="name">Név</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary mt-2 animate-up-2">Mentés</button>
                        <a class="btn btn-secondary mt-2 animate-up-2" href="{{ route('category.index') }}"> Vissza</a>
                    </div>
                </div> 
            </form>
          </div>
        </div>
    </div>
</div>

@endsection