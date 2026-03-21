<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $modelProducts;
    public function __construct()
    {
        $this->modelProducts = new Products();
    }

    public function index()
    {
        $categories = Category::all();
        $products = Products::latest()->take(12)->get(); // lấy 8 sản phẩm mới
        return view('client.home', compact('products', 'categories'));
    }
    public function show($id)
    {
        $products = $this->modelProducts->getDetail($id);
        return view('client.product_detail', compact('products'));
    }
}
