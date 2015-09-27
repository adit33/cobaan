@extends('layout.master')
@section('content')

<body ng-controller="suplierController">
	<div class="container">
		<h1>Tambah Suplier</h1>
	<hr>
	<button id="modal_addsuplier" class="ui positive right labeled icon button">Tambah Suplier</button>
<select ng-model="pagesize" ng-options="opt as opt for opt in pagesizes" id=""></select>
<label>Halaman <% currentPage %> dari <% pagenumber %> halaman</label>
<input ng-model="query"  placeholder="Search">
<table class="ui celled table">
		<thead>
		<tr>
			<th>ID Suplier</th>
			<th>Nama Suplier</th>
			<th>Telepon</th>
			<th>Alamat</th>

			
			<th>Aksi</th>
		</tr>
		</thead>
		<tbody>
		<tr ng-repeat="suplier in datas | filter:paginate" 
			
		>
			
			<td><% suplier.idSuplier %></td>
			<td><% suplier.nama %></td>
			<td><% suplier.telepon %></td>
			<td><% suplier.alamat %></td>
			<td><a href="#" ng-click="delete(suplier.idSuplier)">hapus</td></tr>
		</tr>	
		</tbody>
		<tfoot>
    <tr><th colspan="5">
      <div class="ui right floated pagination menu" total-items="totalItems" ng-model="currentPage"
                                    max-size="10" boundary-links="true"
                                    items-per-page="numPerPage">
        <a class="icon item">
          <i class="left chevron icon"></i>
        </a>
        
        <a class="icon item">
          <i class="right chevron icon"></i>
        </a>
      </div>
 <button ng-click="currentPage=1">First</button>
       <button ng-click="paging(0)">prev</button>
      <button ng-click="paging(1)">next</button>
      <button ng-click="currentPage=pagenumber">Last</button>
    </th>
  </tr></tfoot>
		 
	</table>
	<pagination total-items="totalItems" ng-model="currentPage"
                                    max-size="10" boundary-links="true"
                                    items-per-page="numPerPage">
                        </pagination>

 	</div>

<!-- modal tambah -->

<div class="ui modal" id="modal_addsuplier">
  <i class="close icon"></i>
  <div class="header">
    Tambah Suplier
  </div>
  <div class="image content">
   
    <div class="description">
    {!! Form::open(['class'=>'ui form','ng-submit'=>'addSuplier($event)']) !!}
     
		@include('suplier._form')
	 
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
  
 <script src="{{asset('/js/suplierController.js')}}"></script>

 <script type="text/javascript">
 $( document ).ready(function() {
 $('#modal_addsuplier').click(function(){
        $('.ui.modal').modal('show');
    });
});
</script>	
</body>
  @stop 


