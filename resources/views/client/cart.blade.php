@extends('layouts.user.app')
@section('css')
<style>
    .cart-container {
        background: #fff;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }

    .cart-item {
        border-bottom: 1px solid #eee;
        padding: 20px 0;
        align-items: center;
    }

    .cart-img {
        width: 80px;
        border-radius: 10px;
    }

    .cart-name {
        font-weight: 600;
        color: #2d3436;
    }

    .cart-price {
        color: #d1913c;
        font-weight: bold;
    }

    .qty-box {
        background: #f8f9fa;
        padding: 5px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        border: 1px solid #ddd;
    }

    .qty-box button {
        width: 35px;
        height: 35px;
        border: none;
        background: #636e72;
        color: white;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
    }

    .qty-box input {
        width: 45px;
        text-align: center;
        border: none;
        background: transparent;
        font-weight: bold;
    }

    .total-box {
        font-size: 20px;
        font-weight: bold;
        margin-top: 20px;
    }

    .total-price {
        color: #d1913c;
        font-size: 24px;
    }

    .btn-remove {
        background: #ff7675;
        border: none;
        color: white;
        padding: 6px 10px;
        border-radius: 6px;
    }
    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #f4ede4;
        color: #4a3728;
        padding: 10px 18px;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 1px solid #e8e0d5;
    }

    .btn-back:hover {
        background: #4a3728;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    .btn-checkout {
        background: linear-gradient(135deg, #d1913c, #b87d2f);
        color: white;
        padding: 12px 28px;
        border-radius: 14px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 10px 25px rgba(209, 145, 60, 0.3);
    }

    .btn-checkout:hover {
        background: #a96e27;
        transform: translateY(-2px);
        box-shadow: 0 15px 30px rgba(209, 145, 60, 0.4);
        color: white;
    }
</style>
@endsection
@section('content')
    <div class="container mt-5">
        <div class="cart-container">
            <a href="{{ route('client.home') }}" class="btn-back mb-4">
                <i class="fas fa-arrow-left me-2"></i> Quay lại
            </a>
            <h2>🛒 Giỏ hàng</h2>

            @php $total = 0; @endphp

            @foreach ($cart as $item)
                @php
                    $sub = $item->price * $item->quantity;
                    $total += $sub;
                @endphp
                 
                <div class="row cart-item">
                    
                    <div class="col-md-2">
                        <img src="{{ asset('uploads/products/'.$item->image) }}" class="cart-img">
                    </div>

                    <div class="col-md-3 cart-name">
                        {{ $item->name }}
                    </div>

                    <div class="col-md-2 cart-price">
                        {{ number_format($item->price) }}đ
                    </div>

                    <div class="col-md-3">
                        <div class="qty-box">
                            <button onclick="decrease({{ $item->id }})">-</button>

                            <input type="text" id="qty-{{ $item->id }}" value="{{ $item->quantity }}" readonly>

                            <button onclick="increase({{ $item->id }})">+</button>
                        </div>
                    </div>

                    <div class="col-md-2 cart-price" id="sub-{{ $item->id }}">
                        {{ number_format($sub) }}đ
                    </div>

                    <div class="col-md-1">
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn-remove">X</button>
                        </form>
                    </div>

                    <input type="hidden" id="price-{{ $item->id }}" value="{{ $item->price }}">
                </div>
            @endforeach

            <div class="total-box">
                Tổng: <span id="total" class="total-price">{{ number_format($total) }}đ</span>
            </div>
            <div class="total-box d-flex justify-content-between align-items-center">
                <div>
                    Tổng: <span id="total" class="total-price">{{ number_format($total) }}đ</span>
                </div>

                <a href="" class="btn-checkout">
                    Thanh toán 🧾
                </a>
            </div>
        </div>
    </div>

   <script>
        function increase(id){
            let qty = document.getElementById('qty-' + id);
            qty.value++;
            updateItem(id);
        }

        function decrease(id){
            let qty = document.getElementById('qty-' + id);
            if(qty.value > 1){
                qty.value--;
                updateItem(id);
            }
        }

        function updateItem(id){
            let qty = document.getElementById('qty-' + id).value;
            let price = document.getElementById('price-' + id).value;

            let sub = qty * price;
            document.getElementById('sub-' + id).innerHTML = Number(sub).toLocaleString('vi-VN') + 'đ';
            updateTotal();
            fetch("{{ route('cart.update') }}", {
                method: "POST",
                headers:{
                    "Content-Type":"application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    id:id,
                    quantity:qty
                })
            });
        }

        function updateTotal(){
            let subs = document.querySelectorAll('[id^="sub-"]');
            let total = 0;

            subs.forEach(el => {
                let value = el.innerText.replace(/\D/g, '');
                total += parseInt(value);
            });

            document.getElementById('total').innerText = total.toLocaleString('vi-VN') + 'đ';
        }
</script>
@endsection