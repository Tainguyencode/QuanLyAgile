<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $modelProducts;
    public function __construct()
    {
        $this->modelProducts=new Products();
    }
   public function index()
    {
        $products = Products::latest()->take(12)->get(); // lấy 12 sản phẩm mới
        return view('user.home', compact('products'));
    }
    public function show($id){
        $products=$this->modelProducts->getDetail($id);
        return view('user.product_detail', compact('products'));
    }
}
