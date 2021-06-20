<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prov_Jawabarat extends Model
{
    use SoftDeletes;
    protected $fillable = ['nama_kabupaten_jawabarat', 'luas_wilayah_jawabarat', 'total_penduduk_jawabarat'];
    protected $table = 'prov_jawabarat_locs';
}
