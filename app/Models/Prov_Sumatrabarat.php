<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prov_Sumatrabarat extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kabupaten_sumatrabarat', 'luas_wilayah_sumatrabarat', 'total_penduduk_sumatrabarat'];
    protected $table = 'prov_sumatrabarat_locs';
}
