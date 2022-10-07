<!DOCTYPE html>
<html lang="hu">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <!-- Primary Meta Tags -->
      <title>Regisztráció</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Favicon -->
      <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favicon.png') }}">
      <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon.png') }}">
      <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon.png') }}">
      <link rel="manifest" href="{{ asset('img/favicon.png') }}">
      <link rel="mask-icon" href="{{ asset('img/favicon.png') }}" color="#ffffff">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="theme-color" content="#ffffff">
      <!-- Sweet Alert -->
      <link type="text/css" href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
      <!-- Notyf -->
      <link type="text/css" href="{{ asset('css/notyf.min.css') }}" rel="stylesheet">
      <!-- Volt CSS -->
      <link type="text/css" href="{{ asset('css/volt.css') }}" rel="stylesheet">
      <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
   </head>
   <body>
      <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
      <main>
         <!-- Section -->
         <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container">
               <p class="text-center">
                  <a href="/" class="d-flex align-items-center justify-content-center">
                     <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                     </svg>
                     Vissza a főoldalra
                  </a>
               </p>
               <div class="row justify-content-center form-bg-image" data-background-lg="{{ asset('img/illustrations/signin.svg') }}">
                  <div class="col-12 d-flex align-items-center justify-content-center">
                     <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                        <div class="text-center text-md-center mb-4 mt-md-0">
                           <h1 class="mb-0 h3">Fiók létrehozás</h1>
                        </div>
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <p><strong>Hoppá, valami hiba történt</strong></p>
                            <ul>
                               @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                               @endforeach
                            </ul>
                         </div>
                         @endif
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="name">Név</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path></svg>
                                    </span>
                                        <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" id="name" name="name" placeholder="Teljes név" autofocus="" required="">
                                </div>  
                            </div>
                            <div class="form-group mb-4">
                                <label for="email">E-mail cím</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                    </span>
                                    <input type="email"  id="email"  name="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" placeholder="pelda@pelda.hu"  required="">
                                </div>  
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Jelszó</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                    </span>
                                    <input type="password" id="password"  name="password"  class="form-control {{ $errors->has('password') ? 'error' : '' }}" placeholder="Jelszó" required="">
                                </div>  
                            </div>
                            <div class="form-group mb-4">
                                <label for="password_confirmation">Jelszó újra</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                    </span>
                                    <input type="password" id="password_confirmation"  name="password_confirmation"  class="form-control {{ $errors->has('password_confirmation') ? 'error' : '' }}" placeholder="Jelszó újra" required="">
                                </div>  
                            </div>
    
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Regisztráció
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="d-flex justify-content-center align-items-center mt-4">
                           <span class="fw-normal">
                           Már van fiókja? 
                           <a href="/login" class="fw-bold">Belépés</a>
                           </span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
        </main>
        <!-- Core -->
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- Custom -->
        <script src="{{ asset('js/custom.js') }}" defer></script>
        <!-- Vendor JS -->
        <script src="{{ asset('js/on-screen.umd.min.js') }}"></script>
        <!-- Slider -->
        <script src="{{ asset('js/nouislider.min.js') }}"></script>
        <!-- Smooth scroll -->
        <script src="{{ asset('js/smooth-scroll.polyfills.min.js') }}"></script>
        <!-- Sweet Alerts 2 -->
        <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
        <!-- Moment JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
        <!-- Notyf -->
        <script src="{{ asset('js/notyf.min.js') }}"></script>
        <!-- Simplebar -->
        <script src="{{ asset('js/simplebar.min.js') }}"></script>
        <!-- Volt JS -->
        <script src="{{ asset('js/volt.js') }}" defer></script>
     </body>
  </html>