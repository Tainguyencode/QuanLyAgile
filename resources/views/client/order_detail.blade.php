@extends('layouts.user.app')

@section('content')
    <h2>🧾 Chi tiết đơn hàng</h2>

    <p>Mã đơn: <b>{{ $order->code }}</b></p>
    <p>Trạng thái: {{ $order->status }}</p>
    <p>Thanh toán:
        <span class="badge 
        @if ($order->payment_status == 'paid') bg-success
        @else bg-danger 
        @endif">
            {{ $order->payment_status == 'paid' ? 'Đã thanh toán' : 'Chưa thanh toán' }}
        </span>
    </p>
    <p>Tổng tiền: {{ number_format($order->total) }}đ</p>

    <hr>

    @foreach ($order->items as $item)
        <div style="display:flex; margin-bottom:10px;">
            <img src="{{ asset('uploads/products/' . $item->image) }}" width="80">
            <div style="margin-left:10px;">
                <p>{{ $item->name }}</p>
                <p>x {{ $item->quantity }}</p>
            </div>
        </div>
    @endforeach
    <a class="btn-back mb-4" href="{{ route('orders') }}">
        Quay lại
    </a>
@endsection
