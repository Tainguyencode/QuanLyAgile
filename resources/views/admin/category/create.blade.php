@extends('layouts.admin.app')
@section('content')
    <h2>Thêm mới danh mục</h2>

    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="name">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Ảnh danh mục</label>
            <input type="file" class="form-control" id="image">
        </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <a href="{{ route('admin.category.index') }}">Quay lại</a>
@endsection
