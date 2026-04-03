@extends('layouts.user.app')

@section('content')
    <h2>🧾 Chi tiết đơn hàng</h2>

    <p>Mã đơn: <b>{{ $order->code }}</b></p>
    <p>Trạng thái: {{ $order->status }}</p>
    <p>Tổng tiền: {{ number_format($order->total) }}đ</p>

    <hr>

    @foreach ($order->items as $item)
        <div style="display:flex; margin-bottom:10px;">
            <img src="{{ asset('uploads/products/' . $item->image) }}" width="60">
            <div style="margin-left:10px;">
                <p>{{ $item->name }}</p>
                <p>{{ number_format($item->price) }}đ x {{ $item->quantity }}</p>
            </div>
        </div>
    @endforeach
@endsection
