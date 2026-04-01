@extends('layouts.user.app')

@section('content')
<div class="container mt-5">

    <h2>💳 Thanh toán</h2>

    <div class="row">
        <!-- DANH SÁCH SẢN PHẨM -->
        <div class="col-md-7">
            @foreach($cart as $item)
                <div class="d-flex mb-3">
                    <img src="{{ asset('uploads/products/' . $item->image) }}" width="70">
                    <div class="ms-3">
                        <div><b>{{ $item->name }}</b></div>
                        <div>{{ number_format($item->price) }}đ x {{ $item->quantity }}</div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- THANH TOÁN -->
        <div class="col-md-5">
            <div style="border:1px solid #eee; padding:20px; border-radius:10px;">

                <h4>Tổng tiền: <span style="color:#d1913c">
                    {{ number_format($total) }}đ
                </span></h4>

                <form action="{{ route('checkout.create') }}" method="POST">
                    @csrf

                    <input type="hidden" name="amount" value="{{ $total }}">

                    <!-- COD -->
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="radio" name="method" value="cod" checked>
                        <label class="form-check-label">
                            Thanh toán khi nhận hàng (COD)
                        </label>
                    </div>

                    <!-- QR -->
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="radio" name="method" value="qr">
                        <label class="form-check-label">
                            Thanh toán bằng QR
                        </label>
                    </div>

                    <!-- QR BOX -->
                    <div id="qr-box" style="display:none; text-align:center; margin-top:20px;">
                        <p><b>Quét mã QR để thanh toán</b></p>

                        <img id="qr-img"
                             src="https://img.vietqr.io/image/970422-123456789-compact.png?amount={{ $total }}&addInfo=ThanhToan"
                             width="220">
                    </div>

                    <button class="btn-checkout mt-4 w-100">
                        Xác nhận thanh toán
                    </button>

                </form>

            </div>
        </div>
    </div>

</div>

<script>
    const methods = document.querySelectorAll('input[name="method"]');
    const qrBox = document.getElementById('qr-box');

    methods.forEach(radio => {
        radio.addEventListener('change', function () {
            qrBox.style.display = (this.value === 'qr') ? 'block' : 'none';
        });
    });
</script>

@endsection