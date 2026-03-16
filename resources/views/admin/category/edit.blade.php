@extends('layouts.admin.app')

@section('content')
<h2>Sửa danh mục</h2>

<form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="image" class="form-label">Ảnh danh mục</label>
        <input type="file" name="image" class="form-control" id="image">
        <img src="{{ asset('storage/'.$category->image) }}" width="120">
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Tên danh mục</label>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>

<a href="{{ route('categories.index') }}">Quay lại</a>

@endsection