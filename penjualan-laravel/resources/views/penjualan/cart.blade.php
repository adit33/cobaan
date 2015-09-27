@extends('layout.master')
@section('content')

<body ng-controller="barangController">
	<div class="container">
		<h1>Tambah Penjualan</h1>
	<hr>
<div class="ui grid">
	<div class="twelve wide column">
		<button id="addjual" class="ui positive icon button">Tambah Barang</button>
	</div>
	<div class="four wide column">	
	
<b>No Faktur : {!! $kodeJual !!}</b><br />
<b>Tanggal : {!! $tgl !!}</b><br />
<b>Kasir : {!! Auth::User()->nama !!}</b>
</div>
</div>
<table class="ui celled table">
		<thead>
		<tr>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Total</th>
			<th>Aksi</th>
		</tr>
		</thead>
		<tbody>
			<tr ng-repeat="barang in datas">
			<td><% barang.id %></td>
			<td><% barang.name %></td>
			<td><% barang.qty %></td>
			<td><% barang.price %></td>
			<td><% barang.subtotal %></td>
			<td><a href="{!! URL::to('penjualan/cart/delete/<% barang.rowid %>') !!}">Hapus</td></tr>
			
		</tbody>
		 <tfoot>
	    <tr><th colspan="4"><div align="center"><b>Total</b></div></th>
	    
	    <th colspan="2"><div align="center"><b>{!! Cart::total(); !!}</b></div></th>
	  </tr></tfoot>
	</table>

{!! Form::open(['url' => route('penjualan.store'), 'method' => 'post','class'=>'ui form']) !!}
<div class="ui three column grid">
	<div class="column">
		<div class="two wide column">
			<div class="column">
		 	{!! Form::label('nama','Nama Pelanggan :') !!}
			{!! Form::select('idPelanggan',App\Pelanggan::lists('nama','idPelanggan'),null, ['class' => 'form-control','ng-model'=>'idPelanggan','ng-change'=>'getpelanggan()','id'=>'idPelanggan']) !!}
			</div>
		
			<div class="column">
				{!! Form::label('nama','No. Telepon :') !!}
				{!! Form::text('telepon',null, ['class' => 'form-control','ng-model'=>'telepon','id'=>'telepon']) !!}
			</div>

			<div class="column">
				<br />
				<br />
				<input type="hidden" name="kodeJual" value="{!! $kodeJual !!}">
				<input type="submit" value="Simpan" class="ui green button"></input>
				<a href="{!! URL::to('penjualan/resetCart') !!}"><button class="ui red deny button">Batal</button></a>
 				<a href="{!! URL::to('penjualan/struk') !!}"><input type="button"  class="ui blue button" value="Cetak"></input></a>
 			</div>
		</div>	
	</div>

	
	<div class="seven wide column">
		
			<div class="column">
			{!! Form::label('alamat','Alamat :') !!}
			{!! Form::textarea('alamat',null,['class'=>'form-control','id'=>'alamat','ng-model'=>'alamat']) !!}
			</div>
		
	</div>
		
</div>
	
{!! Form::close() !!}	
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
    <input type="submit" class="ui green button" value="Simpan"></input>
 
      <div class="ui red deny button">
      Batal
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


