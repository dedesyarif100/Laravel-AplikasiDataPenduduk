<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataProvinsi extends Model
{
    use HasFactory;
    protected $fillable = ['nama_provinsi'];
    protected $table = 'data_provinsi';
    // protected $primaryKey = 'id_provinsi';
    // public function name()
    // {
    //     return $this->hasMany('App\Models\DataPenduduk');
    // }
}
