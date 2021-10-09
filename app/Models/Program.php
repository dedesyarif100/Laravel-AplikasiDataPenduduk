<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    // protected $fillable = ['name', 'edulevel_id'];
    // Fillable, Kolom yang didefinisikan pada fillable, valuenya akan masuk ke database
    // Kolom yang tidak didefinisikan pada fillable, valuenya tidak akan masuk ke database

    use SoftDeletes;

    protected $guarded = ['student_price'];
    // guarded, kebalikan dari fillable, kolom yang didefinisikan pada guarded adalah kolom yang tidak boleh di input, Jika tetap di input maka ilainya adalah Null

    // protected $hidden = ['created_at', 'updated_at']; // Hidden untuk Contoh Buat API
    // protected $table = 'programs';

    public function edulevel()
    {
        // return $this->belongsTo(Edulevel::class);
        return $this->belongsTo('App\Models\Edulevel');
    }
}
