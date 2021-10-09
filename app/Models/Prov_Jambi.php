<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prov_Jambi extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nama_kabupaten_jambi', 'luas_wilayah_jambi', 'total_penduduk_jambi'];
    protected $table = 'prov_jambi_locs';
}
