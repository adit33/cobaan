@extends('layout.master')
@section('content')
{!! Form::model ($user,array('url' => route('user.update',$user->id), 'method' => 'put', 'class'=>'ui form', 'files'=>true)) !!}
   		<input type="text" value="{!!$user->nama!!}">
      @include('user._form')
{!! Form::close() !!}
@stop