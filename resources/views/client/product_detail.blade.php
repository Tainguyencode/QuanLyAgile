@extends('layouts.user.app')

@section('css')
    <style>
        .product-detail {
            background: #ffffff;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.06);
            animation: fadeIn 0.8s ease-out;
            border: 1px solid #f1f2f6;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
      .product-img-wrapper {
            width: 100%;
            height: 800px; 
            min-height: 350px;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        .product-img:hover {
            transform: scale(1.1);
        }
        @media (min-width: 1200px) {
            .product-img-wrapper {
                height: 850px;
            }
        }
        .row.align-items-center {
            align-items: stretch !important;
        }
        .product-title {
            font-size: 2.2rem;
            font-weight: 800;
            color: #2d3436;
            margin-bottom: 10px;
        }

        .product-description {
            color: #636e72;
            font-size: 1.1rem;
            margin-bottom: 25px;
        }

        .product-price {
            font-size: 34px;
            font-weight: 800;
            color: #d1913c; 
            margin-bottom: 20px;
            display: block;
        }
        .qty-box {
            background: #f8f9fa;
            padding: 6px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            margin-bottom: 25px;
            border: 1px solid #eee;
        }

        .qty-box button {
            width: 42px;
            height: 42px;
            border: none;
            background: #636e72;
            color: white;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1.2rem;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .qty-box button:hover {
            background: #2d3436;
        }

        .qty-box input {
            width: 50px;
            border: none;
            background: transparent;
            text-align: center;
            font-weight: 700;
            font-size: 1.2rem;
            color: #2d3436;
        }
        .total-section {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2d3436;
            padding: 20px 0;
            border-top: 1px solid #f1f2f6;
        }

        .total-price {
            color: #d1913c; 
            font-size: 1.8rem;
        }
        .btn-cart {
            background: #d1913c; 
            color: white;
            border: none;
            padding: 18px;
            border-radius: 15px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
            box-shadow: 0 8px 20px rgba(209, 145, 60, 0.3);
        }

        .btn-cart:hover {
            background: #b87d2f;
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(209, 145, 60, 0.4);
            color: white;
        }
        .btn-back {
            border: none;
            background: #dfe6e9;
            color: #2d3436;
            border-radius: 10px;
            font-weight: 600;
            padding: 10px 20px;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-back:hover {
            background: #2d3436;
            color: white;
        }
        .related-title {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
            color: #4a3728;
            margin: 50px 0 25px;
        }

        .related-card {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            background: #fff;
        }

        .related-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }

        .related-img {
            height: 180px;
            object-fit: cover;
            transition: 0.4s;
        }

        .related-card:hover .related-img {
            transform: scale(1.1);
        }

        .related-body {
            padding: 15px;
        }

        .related-name {
            font-size: 16px;
            font-weight: 600;
            color: #2d3436;
            margin-bottom: 5px;
        }

        .related-price {
            color: #d1913c;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .related-btn {
            background: #d1913c;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 13px;
            padding: 6px 12px;
            transition: 0.3s;
        }

        .related-btn:hover {
            background: #b87d2f;
            color: white;
        }
    </style>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container mt-5 mb-5">
        <a href="{{ route('client.home') }}" class="btn-back mb-4">
            <i class="fas fa-arrow-left me-2"></i> Quay lại
        </a>
        
        <div class="product-detail">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="product-img-wrapper">
                        <img src="{{ asset('uploads/products/'.$products->image) }}" 
                             class="img-fluid product-img" alt="{{ $products->name }}">
                    </div>
                </div>

                <div class="col-md-6 ps-md-5 mt-4 mt-md-0">
                    <h2 class="product-title">{{ $products->name }}</h2>
                    <p class="product-description">{{ $products->description }}</p>
                    
                    <span class="product-price">
                        {{ number_format($products->price, 0, ',', '.') }}đ
                    </span>

                    <div class="mb-2 text-muted small fw-bold">SỐ LƯỢNG:</div>
                    <div class="qty-box">
                        <button onclick="decrease()" type="button">-</button>
                        <input type="text" id="qty" value="1" readonly>
                        <button onclick="increase()" type="button">+</button>
                    </div>

                    <div class="total-section">
                        Tổng cộng: <span id="total" class="total-price ms-2"></span>
                    </div>

                    <form action="{{ route('cart.add', $products->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-cart w-100 mt-2">
                            <i class="fas fa-shopping-cart me-2"></i> Thêm vào giỏ hàng
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h3 class="related-title">Sản phẩm liên quan</h3>

    <div class="row g-4">
        @foreach($relatedProducts as $item)
            <div class="col-md-3">
                <div class="related-card">
                    
                    <div style="overflow: hidden;">
                        <img src="{{ asset('uploads/products/'.$item->image) }}" 
                            class="w-100 related-img" alt="">
                    </div>

                    <div class="related-body text-center">
                        <div class="related-name">{{ $item->name }}</div>
                        
                        <div class="related-price">
                            {{ number_format($item->price, 0, ',', '.') }}đ
                        </div>

                        <a href="{{ route('client.product.show', $item->id) }}" 
                        class="btn related-btn">
                            Xem chi tiết
                        </a>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

    <script>
        let price = {{ $products->price }};
        
        function updateTotal(){
            let quantity = document.getElementById('qty').value;
            let total = quantity * price;
            document.getElementById('total').innerHTML = total.toLocaleString('vi-VN') + 'đ';
        }
        
        function increase(){
            let qty = document.getElementById('qty');
            qty.value++;
            updateTotal();
        }
        
        function decrease(){
            let qty = document.getElementById('qty');
            if(qty.value > 1) {
                qty.value--;
                updateTotal();
            }
        }
        updateTotal();
    </script>
@endsection