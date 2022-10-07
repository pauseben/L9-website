@if( Auth::check() )
<!DOCTYPE html>
<html lang="hu">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <!-- Primary Meta Tags -->
      <title>
         @isset($title)
         {{ $title }} | 
       @endisset
         selfProject | ADMIN
     </title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Favicon -->
      <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favicon/ficon-dark.png') }}">
      <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/ficon-dark.png') }}">
      <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/ficon-dark.png') }}">
      <link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}">
      <link rel="mask-icon" href="{{ asset('img/favicon/safari-pinned-tab.svg') }}" color="#ffffff">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="theme-color" content="#ffffff">

      <!-- Sweet Alert -->
      <link type="text/css" href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
      <!-- Sweet Alerts 2 -->
      <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
      <!-- Notyf -->
      <link type="text/css" href="{{ asset('css/notyf.min.css') }}" rel="stylesheet">
      <!-- Volt CSS -->
      <link type="text/css" href="{{ asset('css/volt.css') }}" rel="stylesheet">
      <!-- DataTables css -->
      <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
      <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
      <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      
      @include('layouts.includes.admin-nav')
      
   </head>
   <body>
      <main class="content">
        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 p-1">
            <div class="container-fluid px-0">
               <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                  <div class="d-flex align-items-center">
                     <!-- Search form -->
                  </div>
                  <!-- Navbar links -->
                  <ul class="navbar-nav align-items-center">
                    @if (session('impersonated_by'))
                    <b>|</b>
                        <li class="nav-item">
                            <a href="{{ route('users.leave-impersonate') }}" class="btn btn-secondary" class="nav-link"><span class="mb-0 font-small fw-bold text-gray-900">Visszajelentkezés</span></a>
                        </li>
                        <b>|</b>
                    @endif
                     <li class="nav-item dropdown ms-lg-3">
                        <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           <div class="media d-flex align-items-center">
                              <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                 <span class="mb-0 font-small fw-bold text-gray-900">{{ Auth::user()->name }} <svg class="icon icon-xs ms-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></span>
                              </div>
                           </div>
                        </a>
                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
                            <a class="dropdown-item d-flex align-items-center" href="/admin">
                                <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                   <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path>
                                </svg>
                                Admin dashboard
                             </a>
                             <a class="dropdown-item" href="/my-orders">
                              <svg class="dropdown-icon text-gray-400 me-1" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" viewBox="0 0 20 20">
                                 <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                               </svg>
                                 Rendeléseim
                              </a>
                           <a class="dropdown-item d-flex align-items-center" href="/users/profile">
                              <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                 <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                               
                              </svg>
                              Fiókom
                           </a>
                           <div role="separator" class="dropdown-divider my-1"></div>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                              <svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                              </svg>
                              Kijelentkezés
                           </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                            </form>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </nav>
         @if($errors->any())
                <div class="alert alert-danger">
                    <p><strong>Opps Something went wrong</strong></p>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fas fa-bullhorn me-1"></span>
                    {{session('success')}}
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger"></div>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="fas fa-bullhorn me-1"></span>
                    {{session('error')}}
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (Auth::check())
                @yield('content')
            @else
            <div class="alert alert-danger"></div>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="fas fa-bullhorn me-1"></span>
                Nem megfelelő jogosultság
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
      </main>
      
      <!-- Core -->
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <!-- Custom -->
      <script src="{{ asset('js/custom.js') }}" defer></script>
      <!-- Vendor JS -->
      <script src="{{ asset('js/on-screen.umd.min.js') }}"></script>
      <!-- Slider -->
      <script src="{{ asset('js/nouislider.min.js') }}"></script>
      <!-- Smooth scroll -->
      <script src="{{ asset('js/smooth-scroll.polyfills.min.js') }}"></script>
      
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

@else
   404
@endif