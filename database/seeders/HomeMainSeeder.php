<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeMainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $totalRecord = 1;
        $data = [];
        for ($x = 0; $x <= $totalRecord; $x++) {
            $data[] = [
                'status' => "default",
                'description' => "Selamat datang di portofolio saya",
            ];
        }
        DB::table('home_mains')->insert($data);
    }
}
