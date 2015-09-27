<!DOCTYPE html>
<html>
<head>
<title>Data Sewa Gils Studio</title>
<link rel="stylesheet" href="{{ asset('/uikit/css/uikit.almost-flat.min.css')}}" />

</head>
<body>
<h1>Laporan Penjualan Bulan :{!!$bln!!} Tahun:{!! $thn !!}</h1>
 

<table class="uk-table uk-table-striped">
		<thead>
		<tr>
			<th>No Faktur</th>
			<th>Total</th>			
		</tr>
		</thead>
		<tbody>
			
			@foreach($penjualan as $jual)
			<tr>
			<td>{!! $jual->kodeJual !!}</td>
			<td>{!! $jual->total !!}</td>
			</tr>
			@endforeach
		</tbody>
		 
</table>
Jumlah Pemasukan:{!! $jumlah !!}                  

</body>
</html>