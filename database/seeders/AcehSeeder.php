<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcehSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prov_aceh_locs')->insert([
            [
                'nama_kabupaten_aceh' => 'Kabupaten Aceh Barat',
                'luas_wilayah_aceh' => '125212',
                'total_penduduk_aceh' => '122120',
            ],
            [
                'nama_kabupaten_aceh' => 'Kabupaten Aceh Barat Daya',
                'luas_wilayah_aceh' => '125212',
                'total_penduduk_aceh' => '122120',
            ],
            [
                'nama_kabupaten_aceh' => 'Kabupaten Aceh Besar',
                'luas_wilayah_aceh' => '125212',
                'total_penduduk_aceh' => '122120',
            ],
            [
                'nama_kabupaten_aceh' => 'Kabupaten Aceh Jaya',
                'luas_wilayah_aceh' => '125212',
                'total_penduduk_aceh' => '122120',
            ],
            [
                'nama_kabupaten_aceh' => 'Kabupaten Aceh Selatan',
                'luas_wilayah_aceh' => '125212',
                'total_penduduk_aceh' => '122120',
            ],
            [
                'nama_kabupaten_aceh' => 'Kabupaten Aceh Singkil',
                'luas_wilayah_aceh' => '125212',
                'total_penduduk_aceh' => '122120',
            ],
            [
                'nama_kabupaten_aceh' => 'Kabupaten Aceh Tamiang',
                'luas_wilayah_aceh' => '125212',
                'total_penduduk_aceh' => '122120',
            ],
            [
                'nama_kabupaten_aceh' => 'Kabupaten Aceh Tengah',
                'luas_wilayah_aceh' => '125212',
                'total_penduduk_aceh' => '122120',
            ],
            [
                'nama_kabupaten_aceh' => 'Kabupaten Aceh Tenggara',
                'luas_wilayah_aceh' => '125212',
                'total_penduduk_aceh' => '122120',
            ],
            [
                'nama_kabupaten_aceh' => '	Kabupaten Aceh Timur',
                'luas_wilayah_aceh' => '125212',
                'total_penduduk_aceh' => '122120',
            ],
            [
                'nama_kabupaten_aceh' => 'Kabupaten Aceh Utara',
                'luas_wilayah_aceh' => '125212',
                'total_penduduk_aceh' => '122120',
            ],
            [
                'nama_kabupaten_aceh' => 'Kabupaten Bener Meriah',
                'luas_wilayah_aceh' => '125212',
                'total_penduduk_aceh' => '122120',
            ],
            [
                'nama_kabupaten_aceh' => 'Kabupaten Bireuen',
                'luas_wilayah_aceh' => '125212',
                'total_penduduk_aceh' => '122120',
            ],
        ]);
    }
}
