<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prov_Bangkabelitung extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nama_kabupaten_bangkabelitung', 'luas_wilayah_bangkabelitung', 'total_penduduk_bangkabelitung'];
    protected $table = 'prov_bangkabelitung_locs';
}
