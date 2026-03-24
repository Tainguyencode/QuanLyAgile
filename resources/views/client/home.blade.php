@extends('layouts.user.app')

@section('content')

<div class="container-fluid mt-4">
    <h2 class="mb-4">Sản phẩm nổi bật 🔥</h2>
    
    <div class="row g-4"> 
        @foreach($products as $item)
            <div class="col-md-3"> 
                <a href="{{ route('client.product.show', $item->id) }}" 
                style="text-decoration:none; color:inherit;">
                
                    <div class="product-card">
                        <div class="product-img-wrapper">
                            <img src="{{ asset('uploads/products/' . $item->image) }}" alt="{{ $item->name }}">
                        </div>

                        <div class="product-info">
                            <h3 class="product-title">{{ $item->name }}</h3>
                            <p class="product-desc">{{ $item->description ?? 'Mô tả ngắn gọn...' }}</p>

                            <div class="product-footer">
                                <span class="product-price">
                                    {{ number_format($item->price) }}đ
                                </span>
                                
                                <button class="add-to-cart-btn"
                                        onclick="event.preventDefault(); event.stopPropagation();">
                                    +
                                </button>
                            </div>
                        </div>
                    </div>

                </a>

            </div>
        @endforeach
    </div>
</div>
@endsection