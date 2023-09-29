<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'title' => 'タイトル01',
                'content' => 'ブログコンテンツ01だよ。'
            ],
            [
                'title' => 'タイトル02',
                'content' => 'ブログコンテンツ02だよ。'
            ]
        ]);
    }
}
