<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prov_Jawatimur extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nama_kabupaten_jawatimur', 'luas_wilayah_jawatimur', 'total_penduduk_jawatimur'];
    protected $table = 'prov_jawatimur_locs';
}
