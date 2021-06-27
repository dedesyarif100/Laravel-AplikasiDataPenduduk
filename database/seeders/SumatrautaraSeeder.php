<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SumatrautaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prov_sumatrautara_locs')->insert([
            [
                'nama_kabupaten_sumatrautara' => 'Tess 1',
                'luas_wilayah_sumatrautara' => '212121',
                'total_penduduk_sumatrautara' => '1121212',
            ],
            [
                'nama_kabupaten_sumatrautara' => 'Tess 2',
                'luas_wilayah_sumatrautara' => '212121',
                'total_penduduk_sumatrautara' => '1121212',
            ],
            [
                'nama_kabupaten_sumatrautara' => 'Tess 3',
                'luas_wilayah_sumatrautara' => '212121',
                'total_penduduk_sumatrautara' => '1121212',
            ],
            [
                'nama_kabupaten_sumatrautara' => 'Tess 4',
                'luas_wilayah_sumatrautara' => '212121',
                'total_penduduk_sumatrautara' => '1121212',
            ],
            [
                'nama_kabupaten_sumatrautara' => 'Tess 5',
                'luas_wilayah_sumatrautara' => '212121',
                'total_penduduk_sumatrautara' => '1121212',
            ],
            [
                'nama_kabupaten_sumatrautara' => 'Tess 6',
                'luas_wilayah_sumatrautara' => '212121',
                'total_penduduk_sumatrautara' => '1121212',
            ],
        ]);
    }
}
