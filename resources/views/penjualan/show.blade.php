<!--  -->
@extends('layout.master')
@section('content')

<html>

<head>
<link rel="stylesheet" href="{{ asset('/uikit/css/uikit.almost-flat.min.css')}}" />
<h1>Data Penjualan</h1>
</head>

<body>

<table class="uk-table uk-table-striped">
<thead>
<tr>
<th>Tanggal</th>
<th>Kode Transaksi</th>
<th>Nama Barang</th>
<th>Jumlah Beli</th>
<th>Harga Satuan</th>
<th>Total</th>
</tr>
</thead>

<tbody>
@foreach($jual as $juals)
<tr>
<td>{!! $juals->tanggal !!}</td>
<td>{!! $juals->kodeJual !!}</td>
<td>{!! $juals->nama; !!}</td>
<td>{!! $juals->jumlah !!}</td>
<td>{!! $juals->harga !!}</td>
<td>{!! ($juals->jumlah)*($juals->harga) !!}</td>

</tr>
@endforeach
</tbody>

<tr><th colspan="5"><div align="center"><b>Total Harga</b></div></th>
	    
	    <th colspan="1"><div align="center"><b>
			{!! $juals->total; !!}
	    </b></div></th>
</table>
</body>




	
@stop

<html>