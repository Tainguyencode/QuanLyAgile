@extends('layouts.user.app')

@section('content')
    <div class="container mt-5 text-center">

        <h2>Đặt hàng thành công!</h2>

        <p>Mã đơn: <b>{{ session('code') }}</b></p>

        <p>Tổng tiền: {{ number_format(session('amount')) }}đ</p>

        <p>
            @if (session('method') == 'cod')
                Thanh toán khi nhận hàng
            @else
                Vui lòng quét QR để thanh toán
            @endif
        </p>

        <a href="{{ route('client.home') }}" class="btn-checkout mt-3">
            Tiếp tục mua hàng
        </a>

    </div>
@endsection
