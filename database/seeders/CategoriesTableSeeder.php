<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('categories ')->insert([
            'title' => 'Beauty',
            'photo' => 'assets/img/catego2.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories ')->insert([
            'title' => 'Sports',
            'photo' => 'assets/img/catego3.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => 'Health and Wellness',
            'photo' => 'assets/img/catego4.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => 'Automotive',
            'photo' => 'assets/img/catego5.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => 'Books',
            'photo' => 'assets/img/catego6.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
