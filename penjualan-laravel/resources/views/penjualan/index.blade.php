@extends('layout.master')
@section('content')

<body ng-controller="barangController">
	<div class="container">
		<h1>Penjualan</h1>
	<hr>
	<a href="{!! URL::to('penjualan/cart') !!}">Tambah Penjualan</a>

<table class="ui celled table">
		<thead>
		<tr>
			<th>No Faktur</th>
			
			<th>Aksi</th>
		</tr>
		</thead>
		<tbody>
			<tr  ng-repeat="jual in juals">
			<td><% jual.kodeJual %></td>
			<td><a href="{!! URL::to('penjualan/show/<%jual.kodeJual%>') !!}"  >Lihat
			|
			<a href="{!! URL::to('penjualan/delete/<% jual.kodeJual %>') !!}" >Hapus</td></tr>
			
			</tr>
		</tbody>
		 
	</table>

 	</div>

<!-- modal tambah -->

<div class="ui modal" id="addjual">
  <i class="close icon"></i>
  <div class="header">
    Tambah Penjualan
  </div>
  <div class="image content">
   
    <div class="description">
    {!! Form::open(['url' => 'cart/barang','class'=>'ui form','ng-submit'=>'addcart($event)']) !!}
     
		@include('penjualan._form')
	 
    </div>
  </div>
  <div class="actions">
    <div class="ui black deny button">
      Cancel
    </div>
    <input type="submit" class="ui positive right labeled icon button" value="Save"></input>
  </div>
</div>
{!! Form::close() !!} 
  
 <script src="{{asset('/js/barangController.js')}}"></script>

 <script type="text/javascript">
 $( document ).ready(function() {
 $('#addjual').click(function(){
        $('.ui.modal').modal('show');
    });
});
</script>	
</body>
  @stop 


