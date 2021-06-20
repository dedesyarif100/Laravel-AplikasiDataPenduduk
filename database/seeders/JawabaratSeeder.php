<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JawabaratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prov_jawabarat_locs')->insert([
            [
                'nama_kabupaten_jawabarat' => 'Bandung',
                'luas_wilayah_jawabarat' => '232131313',
                'total_penduduk_jawabarat' => '2323131334',
            ],
            [
                'nama_kabupaten_jawabarat' => 'Bogor',
                'luas_wilayah_jawabarat' => '344242424',
                'total_penduduk_jawabarat' => '242423424',
            ],
            [
                'nama_kabupaten_jawabarat' => 'Cianjur',
                'luas_wilayah_jawabarat' => '234234242423',
                'total_penduduk_jawabarat' => '141341423424',
            ],
            [
                'nama_kabupaten_jawabarat' => 'Ciamis',
                'luas_wilayah_jawabarat' => '242423423423',
                'total_penduduk_jawabarat' => '12434432',
            ],
            [
                'nama_kabupaten_jawabarat' => 'Sumber',
                'luas_wilayah_jawabarat' => '2342424234',
                'total_penduduk_jawabarat' => '2424234234',
            ],
            [
                'nama_kabupaten_jawabarat' => 'Indramayu',
                'luas_wilayah_jawabarat' => '113121312',
                'total_penduduk_jawabarat' => '233232321',
            ],
            [
                'nama_kabupaten_jawabarat' => 'Kuningan',
                'luas_wilayah_jawabarat' => '12121212132',
                'total_penduduk_jawabarat' => '232434221',
            ],
            [
                'nama_kabupaten_jawabarat' => 'Cibinong',
                'luas_wilayah_jawabarat' => '1212121232',
                'total_penduduk_jawabarat' => '243242334',
            ],
            [
                'nama_kabupaten_jawabarat' => 'Purwakarta',
                'luas_wilayah_jawabarat' => '3434343',
                'total_penduduk_jawabarat' => '23231312',
            ],
            [
                'nama_kabupaten_jawabarat' => 'Sumedang',
                'luas_wilayah_jawabarat' => '3223423232',
                'total_penduduk_jawabarat' => '213131212',
            ],
            [
                'nama_kabupaten_jawabarat' => 'Cimahi',
                'luas_wilayah_jawabarat' => '454545',
                'total_penduduk_jawabarat' => '54353423',
            ],
            [
                'nama_kabupaten_jawabarat' => 'Sukabumi',
                'luas_wilayah_jawabarat' => '422343434',
                'total_penduduk_jawabarat' => '3545656565',
            ],
        ]);
    }
}
