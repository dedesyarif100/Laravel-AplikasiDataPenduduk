<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prov_Jawatengah extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nama_kabupaten_jawatengah', 'luas_wilayah_jawatengah', 'total_penduduk_jawatengah'];
    protected $table = 'prov_jawatengah_locs';
}
