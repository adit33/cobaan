<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Suplier;
use DB;
class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function idSuplier(){
        $q=DB::table('suplier')->select(DB::raw('MAX(RIGHT(idSuplier,5)) as kd_max'));
        $prfx="SPL-";
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
        $kode=$this->idSuplier();
        $spl=Suplier::all();
        return View('suplier.index',compact('spl','kode'));
    }

    public function apiSuplier(Request $request){
        $supliers=Suplier::all();
       
        return response()->json($supliers); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $spl=new Suplier;
        $spl->idSuplier=$request->input('idSuplier');
        $spl->nama=$request->input('nama');
        $spl->alamat=$request->input('alamat');
        $spl->telepon=$request->input('telepon');
        $spl->save();
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
        $suplier=Suplier::find($id);
        return View('suplier.edit',compact('suplier'));
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
        $suplier=Suplier::find($id);
        $suplier->idSuplier=$request->input('idSuplier');
        $suplier->nama=$request->input('nama');
        $suplier->alamat=$request->input('alamat');
        $suplier->telepon=$request->input('telepon');

        $suplier->save();

        return redirect('suplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $spl=Suplier::find($id);
        if ($spl->delete()) {
            return response()->json(array('success' => TRUE));
        }
     
    }
}
