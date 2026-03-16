<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name'=>'Pizza bò phô mai',
                'image'=>'Pizza.jpg',
                'category_id'=>1,
                'description'=> 'Pizza Bò sốt mềm thơm, béo ngậy.',
                'price'=>78000,
            ],
            [
                'name'=>'Hambuger ',
                'image'=>'buger.jpg',
                'category_id'=>2,
                'description'=> 'Hambeger mềm thơm, béo ngậy.',
                'price'=>58000,
            ],
            [
                'name'=>'Coca cola',
                'image'=>'coca.jpg',
                'category_id'=>3,
                'description'=> 'Coca nước có ga uống là mê li.',
                'price'=>25000,
            ]
        ]);
    }
}
