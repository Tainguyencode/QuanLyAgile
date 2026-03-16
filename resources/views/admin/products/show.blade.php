@extends('layouts.admin.app')
@section('content')
    <h1>Chi tiết sản phẩm</h1>
    <ul>
        <li>Tên sản phẩm: {{ $product->name }}</li>
        <li>Ảnh sản phẩm:  <img src="{{ asset('uploads/products/'.$product->image) }}" width="100"></li>
        <li>Danh mục sản phẩm:{{ $product->category_name }}</li>
        <li>Giá sản phẩm: {{ $product->price }}</li>
        <li>Mô tả sản phẩm: {{ $product->description }}</li>
    </ul>
@endsection