<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenduduk extends Model
{
    use HasFactory;

    protected $table = 'data_penduduk_locs';
    public function provinsi()
    {
        return $this->belongsTo('App\Models\DataProvinsi');
    }
}
