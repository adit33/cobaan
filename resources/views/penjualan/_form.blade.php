<div class="inline field">

<div class="six wide field">
			{!! Form::label('Nama Barang','Kode Barang :') !!} 
			{!! Form::select('id',App\Barang::lists('nama','kodeBarang'),null, ['class' => 'form-control','ng-model'=>'kode','ng-change'=>'getbarang()','id'=>'kode']) !!}
</div>

<div class="field">	
			{!! Form::label('stok','Stok :') !!}
			{!! Form::text('stok',null, ['class' => 'form-control','id'=>'stok','ng-model'=>'stok','readonly'=>'readonly']) !!}				
</div>	

<div class="field">	
			{!! Form::label('harga','Harga :') !!}
			{!! Form::text('harga',null, ['class' => 'form-control','id'=>'harga','ng-model'=>'harga','readonly'=>'readonly']) !!}				
</div>	

<div class="field">	
			{!! Form::label('harga','Jumlah :') !!}
			{!! Form::text('jumlah',null, ['class' => 'form-control','id'=>'jumlah','ng-change'=>'hasil()','ng-model'=>'jumlah','required'=>'required','numbers-only'=>'numbers-only','required'=>'required']) !!}				
</div>		

<div class="field">	
			{!! Form::label('harga','Total :') !!}
			{!! Form::text('total',null, ['class' => 'form-control','id'=>'total','ng-model'=>'total','readonly'=>'readonly']) !!}				
</div>	

</div>