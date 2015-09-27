@extends('layout.master')
{!! Form::open(['class'=>'ui form','url'=>'laporan/penjualan','methode'=>'POST']) !!}
@section('content')
Tahun<select type="text" name="tahun"\>
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
</select>
Bulan<select type="text" name="bulan"\>
<option value="1">Januari</option>
<option value="2">Februari</option>
<option value="3">Maret</option>
<option value="4">April</option>
<option value="5">Mei</option>
<option value="6">Juni</option>
<option value="7">Juli</option>
<option value="8">Agustus</option>
<option value="9">September</option>
<option value="10">Oktober</option>
<option value="11">November</option>
<option value="12">Desember</option>

<input type="submit" value="Ok">
{!! Form::close() !!}
@stop