<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pelanggan;
use DB;
class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function idPelanggan(){
        $q=DB::table('pelanggan')->select(DB::raw('MAX(RIGHT(idPelanggan,5)) as kd_max'));
        $prfx="PLG-";
        if($q->count()>0)
        {
            foreach($q->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = $prfx.sprintf("%06s", $tmp);
            }
        }
        else
        {

            $kd = $prfx."000001";
        }

        return $kd;
    }


    public function index()
    {
        $pelanggans=Pelanggan::all();
        $kode=$this->idPelanggan();
             
        return View('pelanggan.index',compact('pelanggans','kode'));
    }

    public function apiPelanggan(Request $request){
        $pelanggans=Pelanggan::all();
       
        return response()->json($pelanggans); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $plg=new Pelanggan;
        $plg->idPelanggan=$request->input('idPelanggan');
        $plg->nama=$request->input('nama');
        $plg->telepon=$request->input('telepon');
        $plg->alamat=$request->input('alamat');
        $plg->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
       $pelanggan= DB::table('Pelanggan')->where('idPelanggan','=',$id)->first();
       return View('pelanggan.edit',compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $pelanggan=Pelanggan::find($id);
        $pelanggan->idPelanggan=$request->input('idPelanggan');
        $pelanggan->nama=$request->input('nama');
        $pelanggan->alamat=$request->input('alamat');
        $pelanggan->telepon=$request->input('telepon');
        $pelanggan->save();

        return redirect('pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
       
       if ($pelanggan= DB::table('Pelanggan')->where('idPelanggan','=',$id)->delete()) {
            return response()->json(array('success' => TRUE));
        }
     
    }
}
