@extends('layouts.admin', ['title' => 'Fájlkezelő'])
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">


<div id="fm" style="height: calc(100vh - 90px);"></div>

  <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

@endsection