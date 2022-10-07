@extends('layouts.admin', ['title' => 'Új étel létrehozás'])

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
$( function() {
 var hide = [
    @foreach ($products as $product)
         "{{ $product->datum }}", 
    @endforeach
 ];
  $( "#datum" ).datepicker({
    dateFormat: "yy-mm-dd",
         firstDay: 1,
         minDate: 0,
         noWeekends: true,
         beforeShowDay: $.datepicker.noWeekends,
         beforeShowDay: function(date){
            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
            var day = date.getDay();
            return [ ( day > 0 && day < 6 && hide.indexOf(string) == -1), "" ];
        }
  });
} );
</script>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Új étel hozzáadás</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">        
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
            
                <div class="row mb-4">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group mb-4">
                            <strong>Leves:</strong>
                            <input type="text" name="leves" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <strong>A menü:</strong>
                            <input type="text" name="a_menu" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <strong>B menü:</strong>
                            <input type="text" name="b_menu"  class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <div class="form-group">
                            <strong>Dátum:</strong>
                            <input type="text" name="datum" id="datum"  class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary mt-2 animate-up-2">Mentés</button>
                    <a href="{{ route('products.index') }}" class="btn btn-warning mt-2 animate-up-2">Vissza</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection