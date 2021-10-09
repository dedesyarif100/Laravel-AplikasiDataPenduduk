<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prov_Sumatrabarat;
// use Illuminate\Support\Facades\DB;

class SumatrabaratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prov_Sumatrabarat::insert([
            [
                'nama_kabupaten_sumatrabarat' => 'aaa',
                'luas_wilayah_sumatrabarat' => '111',
                'total_penduduk_sumatrabarat' => '111',
            ],
            [
                'nama_kabupaten_sumatrabarat' => 'bbb',
                'luas_wilayah_sumatrabarat' => '222',
                'total_penduduk_sumatrabarat' => '222',
            ],
            [
                'nama_kabupaten_sumatrabarat' => 'ccc',
                'luas_wilayah_sumatrabarat' => '333',
                'total_penduduk_sumatrabarat' => '333',
            ],
            [
                'nama_kabupaten_sumatrabarat' => 'ddd',
                'luas_wilayah_sumatrabarat' => '444',
                'total_penduduk_sumatrabarat' => '444',
            ],
            [
                'nama_kabupaten_sumatrabarat' => 'eee',
                'luas_wilayah_sumatrabarat' => '555',
                'total_penduduk_sumatrabarat' => '555',
            ],
        ]);
    }
}
