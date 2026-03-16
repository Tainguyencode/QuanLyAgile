@extends('layouts.admin.app')

@section('content')

<h2>Sửa danh mục</h2>

<form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="image" class="form-label">Ảnh danh mục</label>
        <input type="file" name="image" class="form-control" id="image">

        <br>

        @if($category->image)
            <img src="{{ asset('uploads/categories/'. $category->image) }}" width="120">
        @endif
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Tên danh mục</label>
        <input 
            type="text" 
            name="name" 
            id="name" 
            class="form-control" 
            value="{{ $category->name }}"
        >
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>

</form>

<br>

<a href="{{ route('category') }}" class="btn btn-secondary">Quay lại</a>

@endsection