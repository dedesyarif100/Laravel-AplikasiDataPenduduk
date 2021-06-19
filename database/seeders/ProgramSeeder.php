<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->insert([
            [
                'edulevel_id' => 3,
                'name' => 'Andri',
                'student_price' => '112313',
                'student_max' => '12',
                'info' => 'SMP',
            ],
            [
                'edulevel_id' => 4,
                'name' => 'Joni',
                'student_price' => '12323',
                'student_max' => '34',
                'info' => 'SMA',
            ],
            [
                'edulevel_id' => 5,
                'name' => 'Ken',
                'student_price' => '43424',
                'student_max' => '33',
                'info' => 'SMK',
            ],
        ]);
    }
}
