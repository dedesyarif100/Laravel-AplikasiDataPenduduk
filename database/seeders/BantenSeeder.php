<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BantenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prov_banten_locs')->insert([
            [
                'nama_kabupaten_banten' => 'Lebak',
                'luas_wilayah_banten' => '1250',
                'total_penduduk_banten' => '122120',
            ],
            [
                'nama_kabupaten_banten' => 'Pandeglang',
                'luas_wilayah_banten' => '1250',
                'total_penduduk_banten' => '122120',
            ],
            [
                'nama_kabupaten_banten' => 'Serang',
                'luas_wilayah_banten' => '1250',
                'total_penduduk_banten' => '122120',
            ],
            [
                'nama_kabupaten_banten' => 'Tangerang',
                'luas_wilayah_banten' => '1250',
                'total_penduduk_banten' => '122120',
            ],
            [
                'nama_kabupaten_banten' => 'Cilegon',
                'luas_wilayah_banten' => '1250',
                'total_penduduk_banten' => '122120',
            ],
            [
                'nama_kabupaten_banten' => 'Tangerang Selatan',
                'luas_wilayah_banten' => '1250',
                'total_penduduk_banten' => '122120',
            ],
        ]);
    }
}
