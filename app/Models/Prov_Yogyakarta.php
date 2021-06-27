<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prov_Yogyakarta extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nama_kabupaten_yogyakarta', 'luas_wilayah_yogyakarta','total_penduduk_yogyakarta'];
    protected $table = 'prov_yogyakarta_locs';
}
