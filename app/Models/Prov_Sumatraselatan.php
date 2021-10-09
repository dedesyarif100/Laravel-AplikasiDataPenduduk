<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prov_Sumatraselatan extends Model
{
    // use HasFactory;
    use softDeletes;
    protected $fillable = ['nama_kabupaten_sumatraselatan', 'luas_wilayah_sumatraselatan', 'total_penduduk_sumatraselatan'];
    protected $table = 'prov_sumatraselatan_locs';
}
