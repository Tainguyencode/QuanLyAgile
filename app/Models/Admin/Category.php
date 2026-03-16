<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    public function getAll(){
        return DB::table('categories')->get();
    }
    public function findByid($id){
        return DB::table('categories')
                ->where('id', $id)->first();
    }
    public function insertCategory($data){
        return DB::table('categories')
                ->insert([
                    'name'=>$data['name'],
                    'image'=>$data['image'],
                    'created_at'=> now()
                ]);
    }
    public function updateCategory($id, $data){
        return DB::table('categories')
                ->where('id', $id)
                ->update([
                    'name'=>$data['name'],
                    'image'=>$data['image'],
                    'updated_at'=> now()
                ]);
    }
    public function deleteCategory($id){
        return DB::table('categories')->where('id', $id)->delete();
    }
}
