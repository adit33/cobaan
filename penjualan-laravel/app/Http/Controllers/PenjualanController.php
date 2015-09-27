<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Penjualan;
use App\Pelanggan;
use App\Detailjual;
use App\Barang;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Cart;
use PDF;
use DateTime;
use Auth;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getDate(){
        date_default_timezone_set('Asia/Jakarta');
        $dt = new DateTime();
        return $dt->format('Y-m-d');
    }

    public function kodeJual(){
        $q=DB::table('jual')->select(DB::raw('MAX(RIGHT(kodeJual,5)) as kd_max'));
        $prx="TRS-";
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

    public function getdata(Request $request){
        $bln=$request->input('bulan');
        $thn=$request->input('tahun');
        $penjualan=Penjualan::whereMonth('tanggal','=',$bln)
        ->whereYear('tanggal','=',$thn)
        ->get();
        $jumlah=Penjualan::whereMonth('tanggal','=',$bln)
        ->whereYear('tanggal','=',$thn)
        ->sum('total');
        $kode=$this->kodeJual();
        $data['penjualan']=$penjualan;
        $data['kode']=$kode;
        $data['jumlah']=$jumlah;
         $data['bln']=$bln;
        $data['thn']=$thn;
        $pdf = PDF::loadView('penjualan.laporan', $data);
        return $pdf->stream();
    }

    public function faktur(){
        $cart=Cart::content();
        $kode=$this->kodeJual();
        $tgl=$this->getDate();
        $data['struks']=$cart;
        $data['kode']=$kode;
        $data['tgl']=$tgl;
        $pdf=PDF::loadView('penjualan.struk',$data);
        return $pdf->stream();
    }

    public function resetCart(){
        Cart::destroy();
        return redirect('penjualan');    
    }

    public function laporan(){
        return View('penjualan.report');
    }

    public function index(){
        $penjualan=Penjualan::all();
        return View('penjualan.index',compact('penjualan','jual'));
    }

    public function apiJual(){
        $penjualan=Penjualan::all();
        return response()->json($penjualan);
    }

    public function apicart(){
        $cart=Cart::content();
        return $cart;
    }

    public function addCart(Request $request){
        $kode=$request->input('id');
        $nama=$request->input('name');
        $harga=$request->input('price');
        $jumlah=$request->input('qty');
        $total=$request->input('total');

        $cart=Cart::add($kode,$nama,$jumlah,$harga);

        return response()->json($kode);
    }
    
    public function deletecart($rowId){
           Cart::remove($rowId);
           return redirect()->to('penjualan/cart'); 
    }
    public function cart()
    {
        $cart=Cart::content();
        $tgl=$this->getDate();
        $kodeJual=$this->kodeJual();
        return View('penjualan.cart',compact('kodeJual','cart','tgl'));
    }

    public function apiBarang(Request $request){
        $kode=$request->input('kode');
        $barang=Barang::where('kodeBarang','=',$kode)->get();
       
        return response()->json($barang); 
    }

    public function apiPelanggan(Request $request){
        $idPelanggan=$request->input('idPelanggan');
        $pelanggan=Pelanggan::where('idPelanggan','=',$idPelanggan)->get();       
        return response()->json($pelanggan); 
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
         
         $jual=new Penjualan;
         
         $jual->kodeJual=$request->input('kodeJual');
         $jual->tanggal=$this->getDate();
         $jual->total=Cart::total();
         $jual->nama=Auth::User()->nama;
         $jual->idPelanggan=$request->input('idPelanggan');
         $jual->save();
        
        $carts=Cart::content();
        foreach($carts as $cart){
         $detailjual=new Detailjual;   
         $detailjual->kodeJual=$request->input('kodeJual');
         $detailjual->kodeBarang=$cart->id;
         $detailjual->jumlah=$cart->qty;
         $detailjual->save();


     
        }
    Cart::destroy();
    return redirect('penjualan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // SELECT jual.kodeJual,tanggal,jual.nama,barang.nama FROM `jual` join detailjual ON jual.kodeJual=detailjual.kodeJual join barang on barang.kodeBarang=detailjual.kodeBarang 
       $jual=DB::table('jual')
        ->join('detailjual','jual.kodeJual','=','detailjual.kodeJual')
        ->join('barang','barang.kodeBarang','=','detailjual.kodeBarang')
        ->join('pelanggan','pelanggan.idPelanggan','=','jual.idPelanggan')
        ->where('jual.kodeJual','=',$id)
        ->select('jual.kodeJual','jual.tanggal','jual.nama','barang.nama','detailjual.jumlah','barang.harga','jual.total')
        ->get();
        
        $total=DB::table('jual');
        return View('penjualan.show',compact('jual','total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function hapus($id)
    {
        $jual=Penjualan::find($id);
        $jual->delete();
        Detailjual::where('kodeJual','=',$id)->delete();
      
        return redirect('/penjualan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
     $pjl=Penjualan::find($id);
     $pjl->delete();

     $dtl=Detailjual::where('kodeJual','=',$id);
     $dtl->delete();

     return redirect('penjualan');
    }
}
