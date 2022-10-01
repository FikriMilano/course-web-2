<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EducationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $totalRecord = 20;
        $data = [];
        for ($x = 0; $x <= $totalRecord; $x++) {
            $data[] = [
                'school' => Str::random(32),
                'graduationYear' => Str::random(4),
                'description' => Str::random(100)
            ];
        }
        DB::table('education')->insert($data);
    }
}
