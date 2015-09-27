@extends('layout.master')

@section('content')

<body ng-controller="masterbarangController">
    <div class="container">
        <h1>Parfume</h1>
    <hr>
    <button id="modal_addbarang" class="ui positive icon button">Tambah Barang</button>

<table class="ui celled table">
        <thead>
        <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Harga</th>
            
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="barang in datas">
            
            <td><% barang.kodeBarang %></td>
            <td><% barang.nama %></td>
            <td><% barang.stok %></td>
            <td><% barang.harga | currency:"Rp.":0 %></td>
            <td><a href="#" ng-click="delete(barang.kodeBarang)">Hapus | <a href="{!! URL::to('barang/edit/<% barang.kodeBarang %>') !!}">Ubah</a></td></tr>
        </tr>   
        </tbody>
         
    </table>


    </div>

<!-- modal tambah -->

<div class="ui modal" id="modal_addbarang">
  <i class="close icon"></i>
  <div class="header">
    Tambah Barang
  </div>
  <div class="image content">
   
    <div class="description">
    {!! Form::open(['class'=>'ui form','ng-submit'=>'addBarang($event)']) !!}
     
    @include('barang._form')

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
  
 <script src="{{asset('/js/masterbarangController.js')}}"></script>

 <script type="text/javascript">
 $( document ).ready(function() {
 $('#modal_addbarang').click(function(){
        $('.ui.modal').modal('show');
    });
});
</script>   
</body>

@stop