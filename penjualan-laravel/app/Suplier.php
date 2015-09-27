<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
  protected $table='suplier';
  protected $primaryKey='idSuplier';
  public $timestamps=false;
  protected $fillable=['idSuplier','nama','alamat','telepon'];
}
