<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use DB;
use Illuminate\Http\Request;

class Penjualan extends Model
{
    protected $table='jual';
	public $timestamps=false;
	protected $fillable = ['kodeJual','kodeBarang'];
	protected $primaryKey='kodeJual';

    public function tambahJual(Request $request){
        $jual=new Jual;
        $jual->kodeJual=$request->input('kodeJual');
        $jual->save();
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
    }
}
