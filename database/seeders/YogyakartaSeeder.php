<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class YogyakartaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prov_yogyakarta_locs')->insert([
            [
                'nama_kabupaten_yogyakarta' => 'Bantul',
                'luas_wilayah_yogyakarta' => '344242424',
                'total_penduduk_yogyakarta' => '242423424',
            ],
            [
                'nama_kabupaten_yogyakarta' => 'Sleman',
                'luas_wilayah_yogyakarta' => '344242424',
                'total_penduduk_yogyakarta' => '242423424',
            ],
            [
                'nama_kabupaten_yogyakarta' => 'Wates',
                'luas_wilayah_yogyakarta' => '344242424',
                'total_penduduk_yogyakarta' => '242423424',
            ],
        ]);
    }
}
