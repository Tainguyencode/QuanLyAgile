<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Products;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientProduct extends Controller
{
    public function getByCategory($id)
    {
        $products = Products::where('category_id', $id)->paginate(10);
        $categories = Category::all();

        return view('client.home', compact('products', 'categories'));
    }



    public function createOrder()
    {
        $cart = Cart::where('user_id', Auth::id())->get();

        if ($cart->isEmpty()) {
            return redirect()->back()->with('error', 'Giỏ hàng trống!');
        }

        DB::beginTransaction();

        try {
            $total = $cart->sum(function ($item) {
                return $item->price * $item->quantity;
            });

            $order = Order::create([
                'user_id' => Auth::id(),
                'total' => $total,
                'status' => 'pending'
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'name' => $item->name,
                    'image' => $item->image,
                    'price' => $item->price,
                    'quantity' => $item->quantity
                ]);
            }

            // 🧹 Xóa giỏ hàng sau khi đặt
            $cart = Cart::where('user_id', Auth::id())->delete();

            DB::commit();

            return redirect()->route('order.success')->with('success', 'Đặt hàng thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra!');
        }
    }
}
