
    @extends('layouts.default', ['title' => 'Blog'])
    @section('content')
            <!-- Jumbotron -->
            <div id="intro" class="p-5 text-center bg-light">
                <h1 class="mb-3 h2">Bejegyzések</h1>
                <p class="mb-3">Összes bejegyzés aloldala</p>
              </div>
              <!-- Jumbotron -->
              
      <!--Main layout-->
      <main class="my-5">
        <div class="container">
          <!--Section: Content-->
          <section class="text-center">
    
            <div class="row">
    @foreach ($posts as $post)

              <div class="col-lg-4 col-md-12 mb-4 ">
                <div class="card bg-light rounded-3 shadow-sm">
                  <a href="/blog/{{ $post->slug }}">
                  <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                    <img src="{{ $post->image }}" class="card-img-top blog-thumbnail-img" alt="selfProject Mintakép" />
                      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                  </div>
                  </a>
                  <div class="card-body">
                    <h5 class="card-title"><a href="/blog/{{ $post->slug }}">{!! Str::limit($post->title, 20) !!}</a></h5>
                    <p class="card-text">
                        {!! Str::limit($post->content, 120) !!}
                    </p>
                    <a href="/blog/{{ $post->slug }}" class="btn btn-selfProject-primary">Tovább</a>
                  </div>
                </div>
              </div>


     @endforeach
     
    </div>
</section>
<!--Section: Content-->


</div>
</main>
<!--Main layout-->
               <!-- Pagination -->
               <div class="container">
                <div class="row">
                    <div class="col-12 text-center">{!! $posts->withQueryString()->links('pagination::bootstrap-5') !!}</div>
                </div>
               </div>
               
    @endsection
