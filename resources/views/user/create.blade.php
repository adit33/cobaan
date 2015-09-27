	@extends('layout.master')
@section('content')
<body ng-controller="userController">
	<div class="container">
		<h1>Tambah Data</h1>
	<hr> 
	
 	</div> 
<button id="cekmodal"class="ui positive right labeled icon button">Tambah User</button>
<table class="ui celled table">
		<thead>
		<tr>
			<th>Nama</th>
			<th>Username</th>
			<th>Password</th>
			<th>Aksi</th>
		</tr>
		</thead>
		<tbody>
			<tr ng-repeat="user in datas">
			<td><% user.nama %></td>
			<td><% user.email %></td>
			<td><% user.password %></td>
			<td>
			<div class="ui tiny buttons">
			  <div class="positive ui button" id="modaledit">Edit</div>
			  <div class="or"></div>
			  <div class="negative ui button" ng-click="delete(user.id)">Hapus</div>
			</div>				
			</td>
			</tr>
		</tbody>
	</table>


<!-- modal tambah -->

<div class="ui modal" id="cekmodal">
  <i class="close icon"></i>
  <div class="header">
    Tambah User
  </div>
  <div class="image content">
   
    <div class="description">
    {!! Form::open(['ng-submit'=>'tambah($event)','class'=>'ui form']) !!}
     
		@include('user._form')
	 
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
<script src="{{asset('/js/app.js')}}"></script>

<!-- Modal edit -->

<!--  -->
<script type="text/javascript">
 $('#cekmodal').click(function(){
        $('.ui.modal').modal('show');
    });

$('#modaledit').click(function(){
        $('.ui.modal').modal('show');
    });
</script>

@stop