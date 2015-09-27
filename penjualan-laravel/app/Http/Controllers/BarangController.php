<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Barang;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;


class BarangController extends Controller
{

     public function kodeBarang(){
        $q=DB::table('barang')->select(DB::raw('MAX(RIGHT(kodeBarang,5)) as kd_max'));
        $prx="BRG-";
        if($q->count()>0)
        {
            foreach($q->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = $prx.sprintf("%06s", $tmp);
            }
        }
        else
        {
            $kd = $prx."000001";
        }

        return $kd;
    }


    public function apiBarang(){
        $barang=Barang::all();
        return response()->json($barang); 
    }

    public function index(){
        $kode=$this->kodeBarang();
        return View('barang.index',compact('kode'));

    }

    public function create()
    {
    	return View('barang.create');
    }

    public function store(Request $request){
        $barang=new Barang;
        // $validator = Validator::make($request->all(),User::$rules,User::$pesan);
        // if ($validator->fails())
        // {
        //     return redirect('user/create')->withErrors($validator)->withInput();
        // }

        $barang->tambahBarang($request);
    }

    public function edit($id){
        $barang= Barang::find($id);
        return View('barang.edit',compact('barang'));
    }

    public function update(Request $request,$id){
        $barang=Barang::find($id);
        $barang->kodeBarang=$request->input('kodeBarang');
        $barang->nama=$request->input('nama');
        $barang->stok=$request->input('stok');
        $barang->harga=$request->input('harga');
        $barang->save();

        return redirect('barang');
    }

    public function destroy($id){
     $barang=Barang::find($id);
     $barang->delete();       
          
    }
}
