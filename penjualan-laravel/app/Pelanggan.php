<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
 public $timestamps=false;
 protected $fillable=['idPelanggan','nama','alamat','telepon'];
 protected $table='pelanggan';
 protected $primaryKey='idPelanggan';
}
