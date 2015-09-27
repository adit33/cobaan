@extends('layout.master')
@section('content')
<body>
<table class="ui celled table">
<thead>
<tr>
	<th>Nama</th>
	<th>Email</th>
	<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach($users as $user)
	<tr>
		<td>{!! $user->nama !!}</td>
		<td>{!! $user->email !!}</td>
		<td>Edit</td>
	</tr>
@endforeach
</tbody>
</table>
@stop
