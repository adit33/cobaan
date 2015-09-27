<html>
<head>
<title>Data Sewa Gils Studio</title>
<link rel="stylesheet" href="{{ asset('/uikit/css/uikit.almost-flat.min.css')}}" />
<h1>Faktur Penjualan</h1>
</head>
<body>

NO Faktur : {!! $kode !!}<br/>
Tanggal	  : {!! $tgl !!}<br/>
Kasir : {!! Auth::User()->nama !!}
<table class="uk-table uk-table-striped">
<thead>
<tr>
<th>Kode Barang</th>
<th>Nama</th>
<th>Jumlah Beli</th>
<th>Harga Satuan</th>
<th>Total</th>
</tr>
</thead>
<tbody>
@foreach($struks as $struk)
<tr>
<td>{!! $struk->id !!}</td>
<td>{!! $struk->name !!}</td>
<td>{!! $struk->qty !!}</td>
<td>{!! $struk->price !!}</td>
<td>{!! $struk->subtotal !!}</td>
</tr>
@endforeach
</tbody>
<tr><th colspan="4"><div align="center"><b>Total Harga</b></div></th>
	    
	    <th colspan="1"><div align="center"><b>{!! Cart::total(); !!}</b></div></th>
</body>
</html>