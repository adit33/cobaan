@extends('layout.master')
@section('content')

<body ng-controller="barangController">
	<div class="container">
		<h1>Tambah Barang</h1>
	<hr>
 	{!! Form::open(['url' => 'cart/barang','class'=>'ui form','ng-submit'=>'addcart($event)']) !!}
		@include('barang._form')
 	<% kode %>
 	<% nama %>
 	<% harga %>
 	</div>

  <script src="{{asset('/semantic/jquery-2.1.4.min.js')}}"></script>
  <script src="{{asset('/js/barangController.js')}}"></script>
  @stop 

<script type="text/javascript">
   
// $(document).ready(function() {
// 	$('#kode').on('change',function(e){
// 		console.log(e);
// 		var kode=e.target.value;
// 		$.get('api?kode='+kode,function(data){
// 			$.each(data,function(index, barangs){
// 			$('#harga').empty();
// 			$('#harga').val(barangs.harga);
// 			$('#stok').val(barangs.stok);
// 			$('#nama').val(barangs.nama);
// 			});
// 		});
// 	});
// });

// $("#kode").change(function(){
//             var kode = $("#kode").val();
          
//             $.ajax({
//                 // type: "POST",
//                 url : "{{ URL::to('api/barang') }}",
//                 data: "kode="+kode,
//                 cache:false,
//                 success: function(data){
//                    console.log(data);
//                 }
//             });
//         });
</script>	
</body>
