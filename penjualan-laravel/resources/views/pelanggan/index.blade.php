@extends('layout.master')
@section('content')

<body ng-controller="pelangganController">
	<div class="container">
		<h1>Pelanggan</h1>
	<hr>
	<button id="modal_addpealanggan" class="ui positive right labeled icon button">Tambah Pelanggan</button>

<table class="ui celled table">
		<thead>
		<tr>
			<th>ID Pelanggan</th>
			<th>Nama Pelanggan</th>
			<th>Alamat</th>
			
			<th>Aksi</th>
		</tr>
		</thead>
		<tbody>
		<tr ng-repeat="pelanggan in datas">
			
			<td><% pelanggan.idPelanggan %></td>
			<td><% pelanggan.nama %></td>
			<td><% pelanggan.alamat %></td>
			<td><a href="{!! URL::to('pelanggan/edit/<% pelanggan.idPelanggan %>') !!}"  >Ubah
			|
			<a href="#" ng-click="delete(pelanggan.idPelanggan)">Hapus</td></tr>

		</tr>	
		</tbody>
		 
	</table>


 	</div>

<!-- modal tambah -->

<div class="ui modal" id="modal_addpealanggan">
  <i class="close icon"></i>
  <div class="header">
    Tambah Pelanggan
  </div>
  <div class="image content">
   
    <div class="description">
    {!! Form::open(['class'=>'ui form','ng-submit'=>'addPelanggan($event)']) !!}
     
		@include('pelanggan._form')
	 
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
  
 <script src="{{asset('/js/pelangganController.js')}}"></script>

 <script type="text/javascript">
 $( document ).ready(function() {
 $('#modal_addpealanggan').click(function(){
        $('.ui.modal').modal('show');
    });
});
</script>	
</body>
  @stop 


