@extends('layouts.user.app')

@php
    function statusText($status)
    {
        return match ($status) {
            'pending' => 'Chờ xác nhận',
            'processing' => 'Đang làm',
            'shipping' => 'Đang giao',
            'completed' => 'Hoàn thành',
            'cancelled' => 'Đã hủy',
            default => 'Không xác định',
        };
    }
@endphp

@section('content')
    <h2>📦 Đơn hàng của tôi</h2>


    @foreach ($orders as $order)
        <div style="border:1px solid #eee; padding:15px; margin-bottom:20px; border-radius:10px;">

            <!-- Mã đơn -->
            <p><b>Mã đơn:</b> {{ $order->code }}</p>

            <!-- Trạng thái -->
            <p><b>Trạng thái:</b> {{ $order->status }}</p>

            <p>Thanh toán:
                {{ $order->payment_status }}
            </p>

            <!-- Danh sách sản phẩm -->
            @foreach ($order->items as $item)
                <div style="display:flex; align-items:center; margin-bottom:10px;">

                    <!-- ẢNH -->
                    <img src="{{ asset('uploads/products/' . $item->image) }}" width="50"
                        style="border-radius:8px; margin-right:10px;">

                    <!-- TÊN -->
                    <div style="flex:1;">
                        {{ $item->name }}
                    </div>

                    <!-- SỐ LƯỢNG -->
                    <div>
                        x{{ $item->quantity }}
                    </div>

                </div>
            @endforeach

            <!-- TỔNG -->
            <p style="text-align:right; font-weight:bold;">
                Tổng: {{ number_format($order->total) }}đ
            </p>
            <a href="{{ route('orders.show', $order->id) }}">Xem chi tiết</a>
        </div>
    @endforeach
    <a href="{{ route('client.home') }}" class="btn-back mb-4">
        <i class="fas fa-arrow-left me-2"></i> Quay lại
    </a>
@endsection
