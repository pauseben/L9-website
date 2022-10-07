@extends('layouts.admin', ['title' => 'Oldal szerkesztés'])
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb py-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                <div class="pull-left">
                    <h4>Oldal szerkesztés</h4>
                </div>
                <div class="pull-right">
                    <a href="/pages/{{ $page->slug }}" class="btn btn-outline-primary" target="_blank">Előnézet</a>
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
    </div>
   
    
  <div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <form action="{{ route('pages.update',$page->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-4">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group mb-4">
                                <label for="title">Cím</label>
                                <input type="text" name="title" id="title" value="{{ $page->title }}" class="form-control" placeholder="title">
                            </div>
                            <div class="form-group mb-4">
                                <label for="slug">Kereső barát név</label>
                                <input type="text" class="form-control" name="slug" id="slug" value="{{ $page->slug }}" readonly/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="row mb-4 bg-dark">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group custom-dropdown">
                                        <label for="menu_id">Menü</label>
                                        <select name="menu_id" class="form-select">
                                            @foreach ($menus as $menu)
                                            <option value="{{ $menu->id }}" {{ ($menu->id == $page->menu_id)? 'selected' : '' }}>{{ $menu->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group custom-dropdown">
                                        <label for="parent_id">Szülő</label>
                                        <select name="parent_id" class="form-select">
                                            <option value="0">Nincs</option>
                                            @foreach ($pages as $item)
                                                <option value="{{ $item->id }}" {{ ($page->parent_id == $item->id)? 'selected': '' }}>{{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group custom-dropdown mb-2">
                                <label for="status">Státusz</label>
                                <select name="status" class="form-select">
                                    <option value="1" {{ ($page->status == 1)? 'selected': '' }}>Aktív</option>
                                    <option value="0" {{ ($page->status == 0)? 'selected': '' }}>Vázlat</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="content">Tartalom</label>
                            <textarea class="wysiwyg form-control" name="content" placeholder="content">{{ $page->content }}</textarea>
                        </div>
                    </div>
                    <input type="hidden" id="modifier" name="modifier" value="{{ Auth::user()->id }}" />
                    
                    
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary mt-2 animate-up-2">Mentés</button>
                        <a class="btn btn-warning mt-2 animate-up-2" href="{{ route('pages.index') }}"> Vissza</a>
                    </div>
                     
                </form>
            </div>
        </div>
    </div>
  </div>



<script src="https://cdn.jsdelivr.net/npm/tinymce@4/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ asset('js/tinymce-hu.js') }}" referrerpolicy="origin"></script>

<script>
    var title = document.getElementById('title');
    var slug = document.getElementById('slug');
    document.getElementById("title").oninput = () => {
        var slugWithoutSpecialChar = removeSpecialCharacters(title.value.toLowerCase());
        var slugWithoutAccent = removeAccent(slugWithoutSpecialChar.toLowerCase());
        slug.value = slugWithoutAccent;
    };
</script>


@endsection