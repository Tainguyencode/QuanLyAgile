@extends('layouts.admin.app')
@section('content')
    <h1>Chi tiết sản phẩm</h1>
    <ul>
        <li>Tên sản phẩm: {{ $product->name }}</li>
        <li>Ảnh sản phẩm:  <img src="{{ asset('uploads/products/'.$product->image) }}" width="100"></li>
        <li>Danh mục sản phẩm:{{ $product->category_name }}</li>
        <li>Giá sản phẩm: {{ $product->price }}</li>
        <li>Số lượng sản phẩm: {{ $product->quantity }}</li>
        <li>Trạng thái sản phẩm: {{ $product->quantity > 0 ? 'Còn hàng' : 'Hết hàng' }}</li>
        <li>Mô tả sản phẩm: {{ $product->description }}</li>
    </ul>
    <a href="{{ route('products') }}" class="btn btn-primary">Quay lại danh sách sản phẩm</a>
@endsection