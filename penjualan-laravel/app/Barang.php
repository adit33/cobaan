<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Http\Request;



class Barang extends Model
{
	protected $table='barang';
	public $timestamps=false;
	protected $fillable = ['kodeBarang','nama', 'stok', 'harga'];
    protected $primaryKey='kodeBarang';

     public function tambahBarang(Request $request){
        $barang=new Barang;
        $barang->kodeBarang=$request->input('kodeBarang');
        $barang->nama=$request->input('nama');
        $barang->stok=$request->input('stok');
        $barang->harga=$request->input('harga');
        $barang->save();
    }
}
