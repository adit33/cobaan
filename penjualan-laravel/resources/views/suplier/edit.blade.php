
@extends('layout.master')
@section('content')

<body ng-controller="suplierController">
	<div class="container">
		<h1>Tambah suplier</h1>
	<hr>

 {!! Form::model($suplier,array('url' => route('suplier.update',['suplier'=>$suplier->idSuplier]), 'method' => 'put', 'class'=>'ui form', 'files'=>true)) !!}

<div class="inline field">

<div class="six wide field">
			{!! Form::label('idSuplier','ID Suplier :') !!} 
			{!! Form::text('idSuplier',$suplier->idSuplier) !!}
	
</div>

<div class="field">
			{!! Form::label('nama','Nama Suplier:') !!}
			{!! Form::text('nama',$suplier->nama) !!}				
</div>

<div class="field">	
			{!! Form::label('telepon','Telepon :') !!}
			{!! Form::text('telepon',$suplier->telepon) !!}
</div>

<div class="field">	
			{!! Form::label('alamat','Alamat :') !!}
			{!! Form::textarea('alamat',$suplier->alamat) !!}
</div>	

<input type="submit" class="ui positive right labeled icon button" value="Save"></input>

</div>
{!! Form::close() !!}

 <script src="{{asset('/js/suplierController.js')}}"></script>

</body>
  @stop 


