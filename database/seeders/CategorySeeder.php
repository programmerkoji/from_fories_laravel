<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Laravel',
                'bg_color_code' => '#93c088'
            ],
            [
                'name' => 'HTML,CSS',
                'bg_color_code' => '#f7b23c'
            ],
            [
                'name' => 'Javascript',
                'bg_color_code' => '#f4b205'
            ],
            [
                'name' => 'React',
                'bg_color_code' => '#968473'
            ],
            [
                'name' => 'その他',
                'bg_color_code' => '#999999'
            ],
        ]);
    }
}
