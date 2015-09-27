<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('login',['uses'=>'UserController@login']);
Route::post('login', array('uses' => 'UserController@doLogin'));
Route::group(['middleware'=>'auth'],function(){

Route::get('/dashboard', function () {
    return view('welcome');
});

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);

Route::get('api/user',array('uses'=>'UserController@apiUser'));
Route::post('api/user',array('uses'=>'UserController@apiStore'));

Route::get('user/{id}/edit',['uses'=>'UserController@edit']);
Route::get('user/create',array('uses'=>'UserController@create'));
Route::get('user',array('uses'=>'UserController@index'));
Route::POST('user/store',array('uses'=>'UserController@store','as'=>'user.store'));
Route::PUT('user/update',array('uses'=>'UserController@update','as'=>'user.update'));
Route::delete('user/{id}',['uses'=>'UserController@destroy']);

Route::get('api/barang',array('uses'=>'BarangController@apiBarang'));
Route::get('barang',array('uses'=>'BarangController@index'));
Route::get('barang/create',array('uses'=>'BarangController@create'));
Route::POST('barang/store',array('uses'=>'BarangController@store','as'=>'barang.store'));
Route::get('api/getkodeBarang',['uses'=>'BarangController@kodeBarang']);
Route::DELETE('barang/delete/{id}',['uses'=>'BarangController@destroy']);
Route::get('barang/edit/{id}',['uses'=>'BarangController@edit']);
Route::PUT('barang/update/{id}',['uses'=>'BarangController@update','as'=>'barang.update']);

Route::get('barang/cart/',function(){
	$cart=Cart::content();
	return View('barang.index',compact('cart'));
});
Route::get('jual/cart/{id}',array('uses'=>'PenjualanController@destroy'));
Route::get('api/cart',array('uses'=>'PenjualanController@apicart'));
Route::POST('cart/jual',array('uses'=>'PenjualanController@addCart','as'=>'add.cart'));

Route::post('laporan/penjualan',['uses'=>'PenjualanController@getData']);
Route::get('penjualan/laporan',['uses'=>'PenjualanController@laporan']);
Route::get('api/penjualan',['uses'=>'PenjualanController@apiJual']);
Route::get('penjualan',array('uses'=>'PenjualanController@index'));
Route::get('penjualan/cart/delete/{id}',array('uses'=>'PenjualanController@deletecart'));
Route::get('penjualan/cart',array('uses'=>'PenjualanController@cart'));
Route::POST('penjualan/store',array('uses'=>'PenjualanController@store','as'=>'penjualan.store'));
Route::get('barang/api',array('uses'=>'PenjualanController@apiBarang'));
Route::get('pelanggan/api',array('uses'=>'PenjualanController@apiPelanggan'));
Route::get('penjualan/struk',array('uses'=>'PenjualanController@faktur'));
Route::DELETE('penjualan/delete/{id}',['uses'=>'PenjualanController@destroy']);
Route::get('penjualan/resetCart',['uses'=>'PenjualanController@resetCart']);
Route::get('penjualan/show/{id}',['uses'=>'PenjualanController@show']);
Route::get('penjualan/delete/{id}',['uses'=>'PenjualanController@hapus']);

Route::get('pelanggan',array('uses'=>'PelangganController@index'));
Route::get('api/pelanggan',array('uses'=>'PelangganController@apiPelanggan'));
Route::get('api/getId',['uses'=>'PelangganController@idPelanggan']);
Route::DELETE('pelanggan/delete/{id}',['uses'=>'PelangganController@destroy']);
Route::POST('pelanggan/store',['uses'=>'PelangganController@store']);
Route::get('pelanggan/edit/{id}',array('uses'=>'PelangganController@edit'));
Route::PUT('pelanggan/update/{id}',['uses'=>'PelangganController@update','as'=>'pelanggan.update']);

Route::get('suplier',array('uses'=>'SuplierController@index'));
Route::get('api/suplier',array('uses'=>'SuplierController@apiSuplier'));
Route::get('api/getIdSuplier',['uses'=>'SuplierController@idSuplier']);
Route::DELETE('suplier/delete/{id}',['uses'=>'SuplierController@destroy']);
Route::POST('suplier/store',['uses'=>'SuplierController@store']);
Route::get('suplier/edit/{id}',array('uses'=>'SuplierController@edit'));
Route::PUT('suplier/update/{id}',['uses'=>'SuplierController@update','as'=>'suplier.update']);

Route::get('logout',['uses'=>'UserController@logout']);

});