@extends('layouts.admin.app')

@section('content')
<h2>Thêm mới danh mục</h2>

<form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Tên danh mục</label>
        <input type="text" name="name" class="form-control" id="name">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Ảnh danh mục</label>
        <input type="file" name="image" class="form-control" id="image">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>

<a href="{{ route('category') }}">Quay lại</a>

@endsection