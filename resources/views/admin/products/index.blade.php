@extends('layouts.admin.app')
@section('content')
    <h2>Danh sách sản phẩm</h2>
    <a href="{{ route('products.create') }}" class="btn btn-sm btn-success">+ Thêm mới sản phẩm</a>
            
    <table class="table">
        <thead>
            <tr>
                <td>Id</td>
                <td>Tên sản phẩm</td>
                <td>Tên danh mục</td>
                <td>Ảnh sản phẩm</td>
                <td>Giá</td>
                <td>Mô tả</td>
                <td>Hành động</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category_name }}</td>
                    <td>
                        <img src="{{ asset('uploads/products/'.$product->image) }}" width="100">
                    </td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('products.show', ['id' => $product->id]) }}" class="btn btn-primary">Xem</a>
                            <a href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data"
                                    onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này')">
                                    @csrf
                                    @method('DELETE')
                                <button class="btn btn-danger">Xóa</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
