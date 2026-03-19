<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    public function getAll()
    {
        return DB::table('products as p')
            ->join('categories as c', 'c.id', '=', 'p.category_id')
            ->select('p.*', 'c.name as category_name')
            ->orderBy('p.id', 'DESC')
            ->get();
    }

    public function findByid($id)
    {
        return DB::table('products as p')
            ->join('categories as c', 'c.id', '=', 'p.category_id')
            ->select('p.*', 'c.name as category_name')
            ->where('p.id', $id)
            ->first();
    }

    public function insertProducts($data)
    {
        return  DB::table('products')->insert([
            'name' => $data['name'],
            'image' => $data['image'],
            'description' => $data['description'],
            'price' => $data['price'],
            'category_id' => $data['category_id']
        ]);
    }

    public function updateProducts($id, $data)
    {
        return  DB::table('products')
            ->where('id', $id)
            ->update([
                'name' => $data['name'],
                'image' => $data['image'],
                'description' => $data['description'],
                'price' => $data['price'],
            ]);
    }

    public function deleteProducts($id)
    {
        return DB::table('products')->where('id', $id)->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
