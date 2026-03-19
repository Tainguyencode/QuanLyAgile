@extends('layouts.admin.app')
@section('content')
    <h2>Danh sách sản phẩm</h2>
    <a href="{{ route('products.create') }}" class="btn btn-sm btn-success">+ Thêm mới sản phẩm</a>

    {{-- FILTER --}}
    <form method="GET" class="row mt-3 mb-3">
    <!-- lọc danh mục -->
    <div class="col-md-3">
        <select name="category_id" class="form-select">
            <option value="">-- Chọn danh mục --</option>
            @foreach($categories as $cate)
                <option value="{{ $cate->id }}"
                    {{ request('category_id') == $cate->id ? 'selected' : '' }}>
                    {{ $cate->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- lọc giá -->
    <div class="col-md-3">
        <select name="price_range" class="form-select">
            <option value="">-- Chọn giá --</option>
            <option value="under_50" {{ request('price_range') == 'under_50' ? 'selected' : '' }}>
                Dưới 50K
            </option>
            <option value="50_100" {{ request('price_range') == '50_100' ? 'selected' : '' }}>
                50K - 100K
            </option>
            <option value="100_200" {{ request('price_range') == '100_200' ? 'selected' : '' }}>
                Trên 100K
            </option>
        </select>
    </div>

    <!-- nút lọc -->
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary w-100">Lọc</button>
    </div>

    <!-- reset -->
    <div class="col-md-2">
        <a href="{{ route('products') }}" class="btn btn-secondary w-100">Reset</a>
    </div>

</form>
            
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
                    <td>{{ $product->category->name ?? '' }}</td>
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
