@extends('layouts.user.app')

@section('content')
    <h2>📦 Đơn hàng của tôi</h2>

@foreach($orders as $order)
    <div style="border:1px solid #eee; padding:15px; margin-bottom:10px;">
        <p>Mã: <b>{{ $order->code }}</b></p>
        <p>Tổng: {{ number_format($order->total) }}đ</p>
        <p>Thanh toán: {{ $order->payment_method }}</p>
        <p>Trạng thái: {{ $order->status }}</p>

        <a href="{{ route('orders.show', $order->id) }}">
            Xem chi tiết
        </a>
    </div>
@endforeach
@endsection