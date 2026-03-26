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
        $categories = Category::all(); // Hiển thị danh mục ở side bar
        $products = Products::latest()->take(12)->get(); // lấy 12 sản phẩm mới
        return view('client.home', compact('products', 'categories'));
    }
    public function show($id)
    {
        $products = Products::findOrFail($id);

        // lấy sản phẩm cùng danh mục
        $relatedProducts = Products::where('category_id', $products->category_id)
            ->where('id', '!=', $products->id) // loại trừ chính nó
            ->latest() // hoặc orderBy tùy bạn
            ->take(4) // lấy 4 sản phẩm
            ->get();

        return view('client.product_detail', compact('products', 'relatedProducts'));
    }
}
