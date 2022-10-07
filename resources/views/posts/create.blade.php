@extends('layouts.admin', ['title' => 'Új bejegyzés létrehozás'])
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Új bejegyzés létrehozás</h2>
        </div>
    </div>
</div>
   
<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf            
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group mb-4">
                                <label for="title">Cím</label>
                                <input type="text" id="title" name="title" class="form-control" >
                            </div>
                            <div class="form-group mb-4">
                                <label for="slug">Kereső barát név</label>
                                <input type="text" class="form-control" name="slug" id="slug" value="" readonly/>
                            </div>         
                            <div class="form-group mb-4">
                                <label for="category_id">Kategóira</label>
                                <select name="category_id" id="category_id" class="form-select w-100 mb-0">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group custom-dropdown mb-4">
                                <label for="status">Státusz</label>
                                <select name="status" class="form-select">
                                    <option value="1">Aktív</option>
                                    <option value="0">Vázlat</option>
                                </select>
                            </div> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            
                            <div class="form-group mb-4">
                                <label for="image">Bélyegkép</label>
                                <br>
                                <div class="input-group">
                                    <input type="text" id="image" class="form-control" name="image"
                                        aria-label="Image" aria-describedby="button-image" value="">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" id="button-image">Kép beállítás</button>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <img src="" id="preview_image" class="border  rounded my-3">
                                </div>
                        </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="content">Tartalom</label>
                                <textarea id="content" class="wysiwyg form-control"  name="content"></textarea>
                            </div>
                        </div>
                        
                         
                        <input type="hidden" name="category_id" value=0 />
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-2">
                                <button type="submit" class="btn btn-primary mt-2 animate-up-2">Mentés</button>
                                <a class="btn btn-secondary mt-2 animate-up-2" href="{{ route('posts.index') }}"> Vissza</a>
                        </div>
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
        var slugWithoutSpecialChar = removeSpecialCharacters(title.value);
        var slugWithoutAccent = removeAccent(slugWithoutSpecialChar);
        slug.value = slugWithoutAccent;
    };
</script>
<!-- File-manager JS -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
      document.getElementById('button-image').addEventListener('click', (event) => {
        event.preventDefault();    
        inputId = 'image';
        window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
      });
    });

    // set file link
    function fmSetLink($url) {
      document.getElementById('image').value = $url;
      $('#image').val($url);
      $('#preview_image').attr('src',$url);
      $('#preview_image').attr('height','255px');
      $('#preview_image').addClass('border-5');
    }
  </script>
@endsection