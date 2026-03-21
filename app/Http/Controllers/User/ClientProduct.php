<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\admin\Products;
use Illuminate\Http\Request;

class ClientProduct extends Controller
{
    public function getByCategory($id){
        $products = Products::where('category_id', $id)->paginate(10);
        $categories = Category::all();

        return view('client.home', compact('products', 'categories'));
    }
}
