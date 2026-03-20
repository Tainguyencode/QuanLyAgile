@extends('layouts.admin.app')
@section('content')
    <div class="card">
        <h2>Chỉnh sửa sản phẩm có id: {{ $products->id }}</h2>
        <form action="{{ route('products.update', $products->id) }}" method="post" enctype="multipart/form-data" class="form-control">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="form-label">Tên sản phẩm: </label>
                <input type="text" name="name" placeholder="Mời bạn nhập tên sản phẩm...." value="{{ $products->name }}">
                @error('name')
                    <p style="color:red">{{ $message }}</p>
                 @enderror
            </div>
            <div class="mb-3">
                <label for="form-label">Tên danh mục: </label>
                <select name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @if($category->id==$products->category_id) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p style="color:red">{{ $message }}</p>
                 @enderror
            </div>
            <div class="mb-3">
                <label for="form-label">Giá sản phẩm: </label>
                <input type="number" name="price" value="{{ $products->price }}">
                 @error('price')
                    <p style="color:red">{{ $message }}</p>
                 @enderror
            </div>
      
            <div class="mb-3">
                <label for="form-label">Số lượng: </label>
                <input type="number" name="quantity" min="0" value="{{ $products->quantity }}">
    
                @error('quantity')
                    <p style="color:red">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="form-label">Mô tả sản phẩm: </label>
                <textarea name="description" id="" cols="30" rows="10">{{ $products->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label"> Hình ảnh: </label>
                <input type="file" name="image" class="form-control" id="" width="100px">
                <img src="{{ asset('uploads/products/'.$products->image) }}" alt="Hình ảnh sản phẩm" width="100px">
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