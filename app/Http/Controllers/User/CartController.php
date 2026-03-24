<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add($id){
        $userId=Auth::id();
        $product=DB::table('products')->where('id',$id)->first();
        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại!');
        }
        $cart = DB::table('carts')
            ->where('user_id', $userId)
            ->where('product_id', $id)
            ->first();
        // Nếu có trong cart 
         if ($cart) {
            // Nếu có rồi  tăng số lượng
            DB::table('carts')
                ->where('id', $cart->id)
                ->update([
                    'quantity' => $cart->quantity + 1
                ]);
        } else {
            // Nếu chưa có  thêm mới
            DB::table('carts')->insert([
                'user_id' => $userId,
                'product_id' => $id,
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng!');
    }

    public function index(){
        $userId = Auth::id();

        $cart = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $userId)
            ->select(
                'products.id',
                'products.name',
                'products.price',
                'products.image',
                'carts.quantity'
            )->get();
            $categories = DB::table('categories')->get();

        return view('client.cart', compact('cart', 'categories'));
    }
    public function update(Request $request){
        $userId = Auth::id();
        DB::class('cart')->where('user_id', $userId)->where('product_id', $request->id)
                        ->update([
                            'quantity'=>$request->quantity,
                            'updated_at'=>now()
                        ]);
        return response()->json(['succes'=>true]);
    }
    public function remove($id)
     {
        $userId = Auth::id();

        DB::table('carts')
            ->where('user_id', $userId)
            ->where('product_id', $id)
            ->delete();

        return redirect()->back()->with('success', 'Đã xóa sản phẩm!');
    }
}
