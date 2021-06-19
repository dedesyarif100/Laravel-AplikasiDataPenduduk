<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EdulevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('edulevels')->insert([
            [
                'name' => 'TK Sederajat',
                'desc' => 'Taman Kanan-kanan',
            ],
            [
                'name' => 'SD Sederajat',
                'desc' => 'SD / Sekolah Dasar',
            ],
            [
                'name' => 'SMP Sederajat',
                'desc' => 'SMP / Sekolah Menengah Pertama',
            ],
            [
                'name' => 'SMA Sederajat',
                'desc' => 'SMA / Sekolah Menengah Akhir',
            ],
            [
                'name' => 'SMK Sederajat',
                'desc' => 'SMK / Sekolah Menengah Kejuruan',
            ],
            [
                'name' => 'SARJANA Sederajat',
                'desc' => 'SARJANA / Sarjana Muda',
            ],
            [
                'name' => 'MAGISTER Sederajat',
                'desc' => 'MAGISTER / MAGISTER Muda',
            ],
            [
                'name' => 'DOCTOR Sederajat',
                'desc' => 'DOCTOR / DOCTOR Muda',
            ],
        ]);
    }
}
