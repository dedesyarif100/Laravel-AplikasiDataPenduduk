<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataPenduduk extends Model
{
    // use HasFactory;
    // use SoftDeletes;

    protected $fillable = ['nik', 'nama', 'tgl_lahir', 'provinsi_id'];
    protected $dates = ['tgl_lahir'];
    // protected $guarded = ['nama'];
    protected $table = 'data_penduduk_locs';
    public function provinsi()
    {
        return $this->belongsTo('App\Models\DataProvinsi');
    }
}
