@extends('layouts.default', ['title' => 'Főoldal'])
@section('content')

<header>

  <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" style="background-image: url('/img/homepage-img.png')">
        <div class="carousel-caption">
          <h1>First slide label</h1>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url('/img/homepage-img2.jpg')">
        <div class="carousel-caption">
          <h1>Second slide label</h1>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url('/img/homepage-img3.jpg')">
        <div class="carousel-caption">
          <h1>Third slide label</h1>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</header>
   
   <div class="container">
      <!-- Rólunk -->
      <div class="row py-5">
        <div class="col-lg-4 text-center d-none d-lg-block">
          <img src="{{ asset('img/green-energy-saving-bg.png') }}" alt="selfProject Mintakép" />
        </div>
        <div class="col-lg-8 py-5">
          <h2 class="py-3 color-selfProject-secondary">Néhány szóval rólunk</h2>
          <p class="text-muted py-4 " style="text-align:justify;">Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. It's also called placeholder (or filler) text. It's a convenient tool for mock-ups. It helps to outline the visual elements of a document or presentation, eg typography, font, or layout.</p>
          <a href="#" class="btn btn-selfProject-primary">Bővebben</a>
        </div>
      </div>
      <!-- Hírek -->
      <div class="row">
        <div class=" p-3 pb-md-4 mx-auto py-3">
            <div class="d-flex justify-content-center align-items-center">
              <img src="{{ asset('img/circel-shape-left.png') }}"  alt="selfProject Mintakép" class="d-none d-lg-block"/>
              <h2 class="mx-2 fw-normal">Legfrissebb híreink</h2>
              <img src="{{ asset('img/circel-shape-right.png') }}" alt="selfProject Mintakép" class="d-none d-lg-block"/>
            </div>
          <div class="row row-cols-1 row-cols-md-3 my-5">
              @foreach ($posts as $post)
              <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm">
                      <div class="card-header p-0">
                        <img src="{{ $post->image }}" class="card-img-top blog-thumbnail-img" alt="selfProject Mintakép" >
                    </div>
                    <div class="card-body bg-light p-5">
                      <span class="color-selfProject-primary">{{ date('Y.m.d.',strtotime($post->created_at)) }}</span>
                      <a href="/blog/{{ $post->slug }}" target="_blank"><h4 class="my-0 fw-normal color-selfProject-secondary">{!! Str::limit($post->title, 20) !!}</h4></a>
                      <p class="text-muted">{!! Str::limit($post->content, 120) !!}</p>
                    </div>
                  </div>

              </div>
              @endforeach
          </div>
        </div>
        <div class="col-12 text-center pb-4">
          <a href="/blog"><h3 class=" fw-normal color-selfProject-secondary">További bejegyzések</h3></a>
        </div>
      </div>
   </div>
   <!-- Full width bg content -->
   <div class="full-width-bg">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12 text-center text-white">
          <img src="{{ asset('img/hand.png') }}" alt="selfProject MIntakép" width="75" height="75" />
          <h1 class="my-5 fw-light">Li Europan lingues es membres del sam familie</h1>
          <p class="lead my-2 mx-4">Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. It's also called placeholder (or filler) text. It's a convenient tool for mock-ups. It helps to outline the visual elements of a document or presentation, eg typography, font, or layout.</p>
          <a href="#" class="btn btn-selfProject-primary my-5">Bővebben</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Pronunciation -->
  <div class="container">
    <div class="row">
      <div class="pricing-header p-3 pb-md-4 mx-auto py-5">
          <div class="d-flex justify-content-center align-items-center">
            <img src="{{ asset('img/circel-shape-left.png') }}"  alt="selfProject Mintakép" class="d-none d-lg-block"/>
            <h2 class="mx-2 fw-normal">Pronunciation</h2>
            <img src="{{ asset('img/circel-shape-right.png') }}" alt="selfProject Mintakép" class="d-none d-lg-block"/>
          </div>
      </div>
      <div class="col-lg-6 col-xs-12 text-center p-5">
        <img src="{{ asset('img/shape-3.png') }}" alt="selfProject Mintakép">
        <h2 class="py-3 color-selfProject-secondary">Souvlaki ignitus</h2>
        <p class="text-muted py-4 ">Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. It's also called placeholder (or filler) text. It's a convenient tool for mock-ups. It helps to outline the visual elements of a document or presentation, eg typography, font, or layout.</p>
        </div>
        <div class="col-lg-6 col-xs-12 text-center p-5">
          <img src="{{ asset('img/shape-4.png') }}" alt="selfProject Mintakép">
          <h2 class="py-3 color-selfProject-secondary">Non sequitur condominium facile et lorem ipsum</h2>
        <p class="text-muted py-4 ">Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over </p>
      </div>
    </div>
  </div>
  <!-- CTA -->
  <div class="container-fluid bg-selfProject-secondary">
    <div class="container">
    <div class="row">
      <div class="col-8 d-flex justify-content-start align-items-center text-white">
        <h2>Duis autem vel eum iriure dolor in hendrerit in vulputate velit<h2>
        </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a href="#" class="btn btn-selfProject-transparent my-5">Bővebben</a>
      </div>
    </div>
    </div>
  </div>
@stop