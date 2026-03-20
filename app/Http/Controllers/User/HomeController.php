<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
    {
        $products = Products::latest()->take(8)->get(); // lấy 8 sản phẩm mới
        return view('user.home', compact('products'));
    }
}
