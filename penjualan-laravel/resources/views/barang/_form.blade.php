<div class="inline field">

<div class="six wide field">
			{!! Form::label('kodeBarang','Kode Barang :') !!} {!!$errors->first('nama')!!}
			{!! Form::text('kodeBarang',null, ['class' => 'form-control','ng-model'=>'kodeBarang','id'=>'kode','ng-init'=>"kodeBarang='$kode'",'readonly'=>'readonly']) !!}
</div>

<div class="field">
			{!! Form::label('nama','Nama Barang:') !!}
			{!! Form::text('nama',null, ['class' => 'form-control','ng-model'=>'nama','id'=>'nama']) !!}				
</div>

<div class="field">	
			{!! Form::label('stok','Stok :') !!}
			{!! Form::text('stok',null, ['class' => 'form-control','id'=>'stok','ng-model'=>'stok','numbers-only'=>'numbers-only']) !!}				
</div>	

<div class="field">	
			{!! Form::label('harga','Harga :') !!}
			{!! Form::text('harga',null, ['class' => 'form-control','id'=>'harga','ng-model'=>'harga','numbers-only'=>'numbers-only']) !!}				
</div>	

				
</div>