@extends('layouts.default', ['title' => 'Ételfutár'])
@section('content')
<link href="{{ asset('css/slick.css') }}" rel="stylesheet">
<link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet">
<div class="container mt-5">
    <h1>Ételfutár</h1>
    <!-- Success message -->
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
</div>
<form action="{{ route('order.store') }}" method="post">
        @csrf
   
  <div class="container-fluid" style="max-width:95vw;">
      <div class="row">
      <!-- Slick slider -->
      <div class=" my-class">
        @foreach ($products as $product)
          <div class="col-12">
            <input type="hidden" name="datum[]" value="{{ $product->datum }}" />
            <div class="border rounded py-4 m-2 text-center">
                <h4>{{ getHunMonthFromDate($product->datum) }}</h4>
                <h5>Leves:</h5>
                <p>{{ $product->leves }}</p>
                <input type="number" id="leves" name="leves[]" class="piece-mask" min=0 placeholder="0 db"/>
                <h5>A menü:</h5>
                <p>{{ $product->a_menu }}</p>
                <input type="number" id="a_menu" name="a_menu[]"  class="piece-mask" min=0 placeholder="0 db"/>
                <h5>B menü:</h5>
                <p>{{ $product->b_menu }}</p>
                <input type="number" id="b_menu" name="b_menu[]" class="piece-mask" min=0 placeholder="0 db"/>
            </div>
          </div>
          @endforeach   
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 my-4">
            <input type="hidden" name="user_id" value="{{ auth()->id() }}" />
            <h4>További adatok:</h4>
            <div class="form-group">
                <label>Név</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" id="email">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label>Telefonszám</label>
                <input type="text" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" name="phone" id="phone" placeholder="+36(20)123-45-67">
                @if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
            </div>
            <input type="submit" name="send" value="Küldés" class="btn btn-{{ (auth()->user())? 'success' : 'dark' }} btn-block mt-3">
        </div>
    </div>
  </div>
</form>
    
</div>
  <script src="{{ asset('js/slick.js') }}" defer></script>
   <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>



   <script type="text/javascript">
    $(document).ready(function(){
      $('.my-class').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 5,
  slidesToScroll: 5,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
    });
  </script>
<script src="https://unpkg.com/imask"></script>
<script>
var phoneMask = IMask(
  document.getElementById('phone'), {
    mask: '{+36}(00)000-00-00'
  });


  var items = document.getElementsByClassName('piece-mask');

    Array.prototype.forEach.call(items, function(element) {
        var phoneMask = new IMask(element, {
      mask: Number,
      min: 0,
    max:99,
    });
    });
  </script>
@stop