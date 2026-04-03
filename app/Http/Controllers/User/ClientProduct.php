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

    public function create(Request $request)
    {
        $request->validate([
            'method' => 'required|in:cod,qr',
            'amount' => 'required|numeric|min:1'
        ]);

        $userId = Auth::id();

        // Lấy cart
        $cart = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $userId)
            ->select(
                'products.id',
                'products.name',
                'products.image',
                'products.price',
                'carts.quantity'
            )->get();

        if ($cart->isEmpty()) {
            return redirect()->back()->with('error', 'Giỏ hàng trống!');
        }

        // tạo mã đơn
        $orderCode = 'DH' . time();

        // tạo order
        $order = Order::create([
            'user_id' => $userId,
            'code' => $orderCode,
            'total' => $request->amount,
            'payment_method' => $request->method,
            'status' => $request->method == 'cod' ? 'pending' : 'waiting_payment'
        ]);

        // lưu order_items
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'name' => $item->name,
                'image' => $item->image,
                'price' => $item->price,
                'quantity' => $item->quantity
            ]);
        }

        // xóa cart
        DB::table('carts')->where('user_id', $userId)->delete();

        return redirect()->route('orders.show', $order->id);
    }

}
