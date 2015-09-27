<!doctype html>
<html lang="en" ng-app="http">
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aplikasi</title>
	<link rel="stylesheet" href="{{asset('/semantic/semantic.css')}}">
  <link rel="stylesheet" href="{{asset('/semantic/daterangepicker.css')}}">
  <script src="{{asset('/semantic/jquery-2.1.4.min.js')}}"></script>
  <script src="{{asset('/semantic/moment.js')}}"></script>
  <script src="{{asset('/semantic/daterangepicker.js')}}"></script>
  <script src="{{asset('/semantic/dist/components/accordion.js')}}"></script>
  
  <script src="{{asset('/semantic/semantic.min.js')}}"></script>
  <script src="{{asset('/lib/angular.min.js')}}"></script>
  <script src="{{asset('/js/app.js')}}"></script>
  <script src="{{asset('/js/barangController.js')}}"></script>
</head>
  <div class="ui inverted left vertical sidebar menu">
    <a class="item" href="{!! URL::to('dashboard') !!}">
      <i class="home icon"></i>
      Home
    </a>
    <a class="item">
      <i class="cube icon"></i>
      Master
    </a>
    <div class="item">
    <a href="{!! URL::to('barang') !!}" class="item">
      Parfume
    </a>
    <a href="{!! URL::to('pelanggan') !!}" class="item">
      Pelanggan
    </a>
    </div>
    <a class="item">
      <i class="add to cart icon"></i>
      Transaksi
    </a>

    <div class="item">
    <a class="item" href="{!! URL::to('penjualan') !!}">
       Penjualan
    </a>

    </div>

    <a class="item">
      <i class="file icon"></i>
      Laporan
    </a>

    <a class="item" href="{{ URL::to('/logout') }}">
      <i class="power icon"></i>
      Logout
    </a>
</div>

<div class="ui blue three item inverted menu">
  <a class="item">
    
  </a>
  <a class="item">
    
  </a>
  <a class="item">
    
  </a>
</div>

  <div class="ui black huge launch right attached button">
          <i class="icon list layout"></i>
          <span class="text" style="display:none;">Menu</span>
  </div>
 

<div class="ui grid">
  <div class="two wide column"></div>
  <div class="twelve wide column">

    @yield('content')    

  </div>
  <div class="two wide column"></div>
</div>

        
<script>
  $(".launch.button").mouseenter(function(){
    $(this).stop().animate({width: '150px'}, 300, 
             function(){$(this).find('.text').show();});
  }).mouseleave(function (event){
    $(this).find('.text').hide();
    $(this).stop().animate({width: '70px'}, 300);
  });
$(".ui.sidebar").sidebar()
                .sidebar('attach events','.ui.launch.button');

             $(document).ready(function(){
                $('.ui.accordion').accordion();
             });


</script>
