<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectTableSeeder extends Seeder
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
                'title' => Str::random(32),
                'description' => Str::random(100),
                'tech' => Str::random(10),
                'members' => Str::random(20),
                'revenue' => Str::random(5)
            ];
        }
        DB::table('projects')->insert($data);
    }
}
