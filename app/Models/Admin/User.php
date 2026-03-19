<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    public function getAll(){
        return DB::table('users')->orderBy('id', 'DESC')->get();

    }
    public function findByid($id){
        return DB::table('users')->where('id', $id)->first();
    }
    public function insertUser($data){
        return DB::table('users')->insert([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'phone'=>$data['phone'],
            'password'=>$data['password'],
            'role'=>$data['role']
        ]);
    }
    public function updateUser($id, $data){
        return DB::table('users')->where('id', $id)
            ->update([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'phone'=>$data['phone'],
            'role'=>$data['role']
        ]);
    }
    public function deleteUser($id){
        return DB::table('users')->where('id', $id)->delete();
    }

}
