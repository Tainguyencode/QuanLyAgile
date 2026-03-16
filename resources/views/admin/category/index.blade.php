@extends('layouts.admin.app')
@section('content')
    <h2>Danh sách danh mục</h2>
    <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-success">+ Thêm mới danh mục</a>
    <table class="table">
        <thead>
            <tr>
                <td>Id</td>
                <td>Ảnh danh mục</td>
                <td>Tên danh mục</td>
                <td>Hành động</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>
                        <img src="{{ asset($category->image) }}" alt="Hình ảnh sản phẩm" width="100">
                    </td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="" class="btn btn-primary">Xem</a>
                            <a href="{{ route('admin.category.edit',$category->id) }}" class="btn btn-warning">Sửa</a>
                            <form action="" method="post" enctype="multipart/form-data"
                                onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này!')">
                                <button class="btn btn-danger">Xóa</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
