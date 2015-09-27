@extends('layout.master')

@section('content')

<body ng-controller="masterbarangController">
    <div class="container">
        <h1>Tambah Barang</h1>
    <hr>
    </div>

  <div class="header">
    Edit Barang
  </div>
  <div class="image content">
   
    <div class="description">
    {!! Form::model($barang,array('url' => route('barang.update',['barang'=>$barang->kodeBarang]), 'method' => 'put', 'class'=>'ui form', 'files'=>true)) !!}
    
       <div class="inline field">

<div class="six wide field">
			{!! Form::label('kodeBarang','Kode Barang :') !!}
			{!! Form::text('kodeBarang',null, ['class' => 'form-control','id'=>'kode','readonly'=>'readonly']) !!}
</div>

<div class="field">
			{!! Form::label('nama','Nama Barang:') !!}
			{!! Form::text('nama',null, ['class' => 'form-control','id'=>'nama']) !!}				
</div>

<div class="field">	
			{!! Form::label('stok','Stok :') !!}
			{!! Form::text('stok',null, ['class' => 'form-control','id'=>'stok','numbers-only'=>'numbers-only']) !!}				
</div>	

<div class="field">	
			{!! Form::label('harga','Harga :') !!}
			{!! Form::text('harga',null, ['class' => 'form-control','id'=>'harga','numbers-only'=>'numbers-only']) !!}				
</div>	

				
</div>
     
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
  
 <script src="{{asset('/js/masterbarangController.js')}}"></script>

 </body>

@stop