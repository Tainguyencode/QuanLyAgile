@extends('layouts.admin.app')
@section('content')
    <div class="card">
        <h2>Thêm sản phẩm mới</h2>
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="form-control">
            @csrf
            <div class="mb-3">
                <label for="form-label">Tên sản phẩm</label>
                <input type="text" name="name" placeholder="Mời bạn nhập tên sản phẩm....">
                @error('name')
                    <p style="color:red">{{ $message }}</p>
                 @enderror
            </div>
            <div class="mb-3">
                <label for="form-label">Tên danh mục</label>
                <select name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p style="color:red">{{ $message }}</p>
                 @enderror
            </div>
            <div class="mb-3">
                <label for="form-label">Giá sản phẩm</label>
                <input type="number" name="price">
                 @error('price')
                    <p style="color:red">{{ $message }}</p>
                 @enderror
            </div>
            
            <div class="mb-3">
                <label for="form-label">Mô tả sản phẩm</label>
                <textarea name="description" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label"> hình ảnh</label>
                <input type="file" name="image" class="form-control" id="" width="100px">
                @error('image')
                    <p style="color:red">{{ $message }}</p>
                 @enderror
            </div>
             
            <div class="mb-3">
                <a href="{{route('products')}}" class="btn btn-sm btn-secondary"> Quay lại</a>
                <button type="submit" class="btn btn-sm btn-success">Lưu</button>
            </div>
        </form>
    </div>
@endsection