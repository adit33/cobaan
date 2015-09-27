
<div class="inline field">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="six wide field">
			{!! Form::label('nama','Nama :') !!} {!!$errors->first('nama')!!}
			{!! Form::text('nama',null, ['class' => 'form-control','ng-model'=>'nama']) !!}
</div>

<div class="six wide field">
			{!! Form::label('username','User Name:') !!}
			{!! Form::text('email',null, ['class' => 'form-control','ng-model'=>'email']) !!}				
</div>

<div class="six wide field">	
			{!! Form::label('password','Password :') !!}
			{!! Form::text('password',null, ['class' => 'form-control','ng-model'=>'password']) !!}				
</div>		
			
										
</div>