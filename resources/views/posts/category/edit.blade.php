@extends('layouts.admin', ['title' => 'Kategória szerkesztés'])
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Kategória szerkesztése</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-5 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <form action="{{ route('category.update',$category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="name">Név</label>
                            <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary mt-2 animate-up-2">Mentés</button>
                        <a class="btn btn-warning mt-2 animate-up-2" href="{{ route('category.index') }}"> Vissza</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>






@endsection