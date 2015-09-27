<div class="inline field">

<div class="six wide field">
			{!! Form::label('idSuplier','ID Suplier :') !!} 
			{!! Form::text('idSuplier',null,['ng-model'=>'idSuplier','ng-init'=>"idSuplier='$kode'"]) !!}
	
</div>

<div class="field">
			{!! Form::label('nama','Nama Suplier :') !!}
			{!! Form::text('nama',null, ['class' => 'form-control','ng-model'=>'nama','id'=>'nama']) !!}				
</div>

<div class="field">	
			{!! Form::label('telepon','Telp :') !!}
			{!! Form::text('telepon',null,['class'=>'form-control','ng-model'=>'telepon']) !!}
</div>	

<div class="field">	
			{!! Form::label('alamat','Alamat :') !!}
			{!! Form::textarea('alamat',null,['class'=>'form-control','ng-model'=>'alamat','ng-init'=>"alamat=''"]) !!}
</div>	

</div>