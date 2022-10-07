<!doctype html>
<html lang="hu">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>
         @isset($title)
         {{ $title }}
         @endisset
          | selfProject
      </title>
      <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon.png') }}">
      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;400;700&display=swap" rel="stylesheet">
      <!-- Styles -->
     <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">-->
      <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

   </head>
   <body>
      <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button">
         <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
          </svg>
      </a>
      <header>
         <div class="p-3 bg-white">
            <div class="container d-flex flex-wrap justify-content-center">
               <div class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto text-sm-center">
                  <a class="navbar-brand" href="{{ url('/') }}">
                  <img src="{{ asset('img/selfProjectlogo.png') }}">
                  </a>
               </div>
               <div class="text-end d-flex jusitfy-content-center align-items-center d-none d-sm-flex">
                  <div class="mx-5">
                     <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="color-selfProject-secondary" viewBox="0 0 16 16">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                     </svg>
                     <a href="mailto:info@selfProject.hu" class="text-reset mx-1">info@selfProject.hu</a>
                  </div>
                  <div class="">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="color-selfProject-secondary" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                     </svg>
                     <a href="tel:+3654410005" class="text-reset">+36 54 410 005</a>
                  </div>
               </div>
            </div>
         </div>
         @if (session('impersonated_by'))
            <a href="{{ route('users.leave-impersonate') }}" class="btn btn-secondary" class="nav-link" style="position: absolute;top:0;right:0;">Visszajelentkezés</a>
          @endif
         <nav class="navbar navbar-expand-lg navbar-dark bg-selfProject-green shadow-sm p-0">
            <div class="container-lg p-0">
               <button class="navbar-toggler second-button ms-auto p-3" type="button" data-toggle="collapse" data-target="#navbarMain"
                     aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
               <div class="animated-icon2"><span></span><span></span><span></span><span></span></div>
            </button>
               <div class="collapse navbar-collapse " id="navbarMain">
                  <!-- Left Side Of Navbar -->
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                     <li class="nav-item">
                        <a class="nav-link {{ (request()->segment(1) == '') ? 'active' : '' }}" aria-current="page" href="/">Főoldal</a>
                     </li>
                     @foreach ($pages as $page)
                     @if($page->parent_id == NULL || $page->parent_id == 0)
                           @if( getSubMenusByParentId($page->id)->isNotEmpty() )
                              <li class="nav-item dropdown">
                                 <a id="dropdown{{ $page->id }}" class="nav-link dropdown-toggle" href="/{{ $page->slug }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre="">
                                 {{ $page->title }}
                                 </a>
                                 <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown{{ $page->id }}">
                                    @foreach (getSubMenusByParentId($page->id) as $submenu)
                                       <a class="dropdown-item" href="/{{ $submenu->slug }}">{{ $submenu->title }}</a>
                                    @endforeach
                                 </div>
                              </li>
                           @else
                              <li class="nav-item">
                                 <a class="nav-link {{ (request()->segment(1) == $page->slug) ? 'active' : '' }}" href="/{{ $page->slug }}">{{ $page->title }}</a>
                              </li>
                           @endif               
                        @endif
                     @endforeach
                  </ul>
                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ms-auto">
                     <!-- Authentication Links -->
                     @guest
                     
                     @if (Route::has('login'))
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Belépés') }}</a>
                     </li>
                     @endif
                     {{--@if (Route::has('register'))
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                     </li>
                     @endif --}}
                     @else
                     <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="{{ route('home') }}">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill color-selfProject-secondary me-2" viewBox="0 0 16 16">
                                 <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                 <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                               </svg>
                           Home
                           </a>
                           <a class="dropdown-item" href="/users/profile">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-person color-selfProject-secondary me-2" viewBox="0 0 16 16">
                                 <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
                                 <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                               </svg>
                           Adataim
                           </a>
                           <a class="dropdown-item" href="{{ route('my-orders') }}">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket2-fill color-selfProject-secondary me-2" viewBox="0 0 16 16">
                                 <path d="M5.929 1.757a.5.5 0 1 0-.858-.514L2.217 6H.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h.623l1.844 6.456A.75.75 0 0 0 3.69 15h8.622a.75.75 0 0 0 .722-.544L14.877 8h.623a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1.717L10.93 1.243a.5.5 0 1 0-.858.514L12.617 6H3.383L5.93 1.757zM4 10a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0v-2zm4-1a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1z"/>
                               </svg>
                              Rendeléseim
                           </a>
                           <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              <svg class="dropdown-icon text-danger me-2" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                              </svg>
                           {{ __('Kijelentkezés') }}
                           </a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                           </form>
                        </div>
                     </li>
                     @endguest
                  </ul>
               </div>
            </div>
         </nav>
      </header>
      <main @if(Request::is('/'))    @else class='my-4'  @endif>
         {{--@if($errors->any())
         <div class="alert alert-danger">
            <p><strong>Opps Something went wrong</strong></p>
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         @endif --}}
         @if(session('success'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="fas fa-bullhorn me-1"></span>
            {{session('success')}}
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
         @endif
         @if(session('error'))
         <div class="alert alert-danger">{{session('error')}}</div>
         @endif
         @yield('content')
      </main>
      <!-- Footer -->
      <footer class="text-center text-lg-start  bg-selfProject-dark">
         <!-- Section: Links  -->
         <section class="text-white bg-selfProject-dark pt-5">
            <div class="container text-center text-md-start">
               <div class="row mt-3">
                  <div class="col-md-4 col-lg-4 col-xl-3  mb-4">
                     <a href="/">
                        <img src="{{ asset('img/selfProjectlogo-white.png') }}" />
                     </a>
                  </div>
                  <div class="col-md-4 col-lg-2 col-xl-2 mx-auto mb-4">
                     <!-- Links -->
                     <h6 class="text-uppercase fw-bold mb-4">Menü</h6>
                     @foreach ($pages as $page)
                     @if($page->parent_id == NULL || $page->parent_id == 0)
                     <p><a href="/{{ $page->slug }}" class="text-reset">{{ $page->title }}</a></p>
                     @endif
                     @endforeach
                     
                  </div>
                  <div class="col-md-4 col-lg-3 col-xl-3 text-sm-start text-center mb-md-0 mb-4">
                     <!-- Links -->
                     <h6 class="text-uppercase fw-bold mb-4">Kapcsolat</h6>
                     <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="color-selfProject-primary me-4" viewBox="0 0 16 16">
                           <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                         </svg>
                         <a href="http://maps.google.com/?q=4130 Derecske, Lengyel u. 1." class="text-reset" target="_blank">4130 Derecske, Lengyel u. 1. </a>

                     </p>
                     <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="color-selfProject-primary me-4" viewBox="0 0 16 16">
                           <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                        </svg>
                        <a href="tel:+3654410005" class="text-reset">+36 54 410 005</a>
                     </p>
                     <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="color-selfProject-primary me-4" viewBox="0 0 16 16">
                           <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                        </svg>
                     <a href="mailto:info@selfProject.hu" class="text-reset">info@selfProject.hu</a>
                  </p>
                  </div>
               </div>
            </div>
         </section>
         <!-- Section: Links  -->
         <!-- Section: Social media -->
         <section class="container text-white d-flex justify-content-center p-4 border-top " >
            <div class="me-5 ">
               <a class=" text-reset mx-2">Adatvédelmi szabályzat</a> |
               <a class=" text-reset mx-2">Adatvédelmi szabályzat</a> |
               <a class=" text-reset mx-2">Adatvédelmi szabályzat</a>
            </div>
         </section>
         <!-- Section: Social media -->
         <!-- Copyright -->
         <div class="text-center bg-light p-4 text-black-50" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2022 Copyright. Minden jog fenntartva | selfProject.hu
         </div>
         <!-- Copyright -->
      </footer>
      <!-- Footer -->
      <!-- Scripts -->
      <script src="{{ asset('js/custom.js') }}" defer></script>
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
      <script>
         $(document).ready(function () {
            $('.second-button').on('click', function () {
               $('.animated-icon2').toggleClass('open');
               $('#navbarMain').toggleClass('show');
            });
            $(window).scroll(function() {
               if ($(this).scrollTop() > 20) {
                  $('#back-to-top').fadeIn();
               } else {
                  $('#back-to-top').fadeOut();
               }
            });
         });
      </script>


   </body>
</html>