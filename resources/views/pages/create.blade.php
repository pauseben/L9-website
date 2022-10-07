@extends('layouts.admin', ['title' => 'Új oldal létrehozás'])
@section('content')

<div class="row">
   <div class="col-lg-12 margin-tb">
      <div class="pull-left">
         <h4 >Új oldal létrehozás</h4>
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
         <form method="post" action="{{ route('pages.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group mb-4">
                        <label for="title">Cím</label>
                        <input type="text" class="form-control" name="title" id="title"/>
                     </div>
                     <div class="form-group mb-4">
                        <label for="slug">Kereső barát név</label>
                        <input type="text" class="form-control" name="slug" id="slug" readonly/>
                     </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="row mb-4">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="menu_id">Menü</label>
                                <select name="menu_id" class="form-select">
                                   @foreach ($menus as $menu)
                                   <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                   @endforeach
                                </select>
                             </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="parent_id">Szülő</label>
                                <select name="parent_id" class="form-select">
                                   <option value="0">Nincs</option>
                                   @foreach ($pages as $page)
                                   <option value="{{ $page->id }}">{{ $page->title }}</option>
                                   @endforeach
                                </select>
                             </div>
                            
                        </div>
                    </div> 
                     <input type="hidden" name="author" value="{{ Auth::user()->id }}" />
                     <div class="form-group ">
                        <label for="status">Státusz</label>
                        <select name="status" class="form-select">
                           <option value="1">Aktív</option>
                           <option value="0">Vázlat</option>
                        </select>
                     </div>
                </div>
            </div> 
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="content">Tartalom</label>
                        <textarea id="content" class="wysiwyg form-control"  name="content"></textarea>
                    </div>
                 </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary mt-2 animate-up-2">Mentés</button>
                    <a href="/pages" class="btn btn-warning mt-2 animate-up-2">Vissza</a>
                </div>
                                 
         </form>
         </div>
      </div>
   </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/tinymce@4/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ asset('js/tinymce-hu.js') }}" referrerpolicy="origin"></script>
<script src="{{ asset('js/custom.js') }}" referrerpolicy="origin"></script>
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