@extends('layouts.default', ['title' => 'Kapcsolat'])
@section('content')
<div class="container">
    <h1>Kapcsolat</h1>
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
    <!-- Success message -->
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    <form action="" method="post" action="{{ route('contact.store') }}">
        <!-- CROSS Site Request Forgery Protection -->
        @csrf
        <div class="form-group">
            <label>Név</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name">
        </div>
        <div class="form-group">
            <label>E-mail</label>
            <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" id="email">
        </div>
        <div class="form-group">
            <label>Telefonszám</label>
            <input type="text" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" name="phone" id="phone" placeholder="+36(20)123-45-67">
        </div>
        <div class="form-group">
            <label>Cím</label>
            <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" name="subject" id="subject">
        </div>
        <div class="form-group">
            <label>Üzenet</label>
            <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}" name="message" id="message" rows="4"></textarea>
        </div>
        <input type="submit" name="send" value="Küldés" class="btn btn-dark btn-block mt-3">
    </form>
</div>
<script src="https://unpkg.com/imask"></script>
<script>
var phoneMask = IMask(
  document.getElementById('phone'), {
    mask: '{+36}(00)000-00-00'
  });
  </script>
@stop