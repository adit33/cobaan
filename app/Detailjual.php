<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailjual extends Model
{
protected $table='detailjual';
public $timestamps=false;
protected $fillable = ['kodeJual','kodeBarang','jumlah'];    
}
