<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name'=>'Pizza',
                'image'=>'pizza.jpg',
            ],
            [
                'name'=>'Burger',
                'image'=>'burger.jpg',
            ],
            [
                'name'=>'Drink',
                'image'=>'drink.jpg',
            ],
        ]);
    }
}
