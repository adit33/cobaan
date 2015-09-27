<div class="inline field">

<div class="six wide field">
			{!! Form::label('idPelanggan','ID Pelanggan :') !!} 
			{!! Form::text('idPelanggan',null,['ng-model'=>'idPelanggan','ng-init'=>"idPelanggan='$kode'"]) !!}
	
</div>


<div class="field">
			{!! Form::label('nama','Nama Pelanggan:') !!}
			{!! Form::text('nama',null, ['class' => 'form-control','ng-model'=>'nama','id'=>'nama']) !!}				
</div>

<div class="field">
			{!! Form::label('telepon','No Telepon:') !!}
			{!! Form::text('telepon',null, ['class' => 'form-control','ng-model'=>'telepon','id'=>'telepon']) !!}				
</div>


<div class="field">	
			{!! Form::label('alamat','Alamat :') !!}
			{!! Form::textarea('alamat',null,['class'=>'form-control','ng-model'=>'alamat','ng-init'=>"alamat=''"]) !!}
</div>	

</div>