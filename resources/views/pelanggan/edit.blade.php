@extends('layout.master')
@section('content')

<body ng-controller="pelangganController">
	<div class="container">
		<h1>Tambah Pelanggan</h1>
	<hr>

 {!! Form::model($pelanggan,array('url' => route('pelanggan.update',['pelanggan'=>$pelanggan->idPelanggan]), 'method' => 'put', 'class'=>'ui form', 'files'=>true)) !!}
<div class="inline field">

<div class="six wide field">
			{!! Form::label('idPelanggan','ID Pelanggan :') !!} 
			{!! Form::text('idPelanggan',$pelanggan->idPelanggan) !!}
	
</div>

<div class="field">
			{!! Form::label('nama','Nama Pelanggan:') !!}
			{!! Form::text('nama',$pelanggan->nama) !!}				
</div>

<div class="field">
			{!! Form::label('telepon','No Telepon:') !!}
			{!! Form::text('telepon',null, ['class' => 'form-control','id'=>'telepon']) !!}				
</div>


<div class="field">	
			{!! Form::label('alamat','Alamat :') !!}
			{!! Form::textarea('alamat',$pelanggan->alamat) !!}
</div>	

<input type="submit" class="ui positive right labeled icon button" value="Save"></input>

</div>
{!! Form::close() !!}

 <script src="{{asset('/js/pelangganController.js')}}"></script>

 <script type="text/javascript">
 $( document ).ready(function() {
 $('#modal_addpealanggan').click(function(){
        $('.ui.modal').modal('show');
    });
});
</script>	
</body>
  @stop 


