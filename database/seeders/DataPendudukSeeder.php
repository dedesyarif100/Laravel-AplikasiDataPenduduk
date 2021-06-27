<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataPendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_penduduk_locs')->insert([
            [
                'nik' => '11111',
                'nama' => 'Dede',
                'tgl_lahir' => '1996-12-15',
                'jenis_kelamin' => 'laki-laki',
                'provinsi_id' => '1',
            ],
            [
                'nik' => '22222',
                'nama' => 'Hendro',
                'tgl_lahir' => '1997-04-18',
                'jenis_kelamin' => 'laki-laki',
                'provinsi_id' => '2',
            ],
        ]);
    }
}
