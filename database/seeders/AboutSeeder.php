<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AboutSeeder extends Seeder
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
                'description' => "Saya Fikri, seorang mahasiswa di Universitas Gadjah Mada",
            ];
        }
        DB::table('abouts')->insert($data);
    }
}
