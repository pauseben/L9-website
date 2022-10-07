
<!DOCTYPE html>
<html lang="hu">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <!-- Primary Meta Tags -->
      <title>Elfelejtett jelszó</title>
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
    <main>
        <!-- Section -->
        <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center form-bg-image">
                    <p class="text-center"><a href="/login" class="d-flex align-items-center justify-content-center">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                       Vissza a belépéshez
                        </a>
                    </p>
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="signin-inner my-3 my-lg-0 bg-white shadow border-0 rounded p-4 p-lg-5 w-100 fmxw-500">
                            <h1 class="h3">Elfelejtette jelszavát?</h1>
                            <p class="mb-4">Ne izguljon! Csak írja be e-mail címét, és küldünk egy kódot a jelszó visszaállításához!</p>
                            <form action="{{ route('password.email') }}" method="POST"> 
                                @csrf
                                <!-- Form -->
                                <div class="mb-4">
                                    <label for="email">E-mail cím</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="email" placeholder="pelda@pelda.com" required autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>  
                                </div>
                                <!-- End of Form -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-gray-800">Jelszó visszaállítása</button>
                                </div>
                            </form>
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