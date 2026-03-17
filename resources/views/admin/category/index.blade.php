@extends('layouts.admin.app')
@section('content')
    <h2>Danh sách danh mục</h2>
    <a href="{{ route('category.create') }}" class="btn btn-sm btn-success">+ Thêm mới danh mục</a>
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
                        <img src="{{ asset('uploads/categories/'. $category->image) }}" alt="Hình ảnh sản phẩm" width="100">
                    </td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('category.show',$category->id) }}" class="btn btn-primary">Xem</a>
                            <a href="{{ route('category.edit',$category->id) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('category.delete', $category->id) }}" method="POST" onsubmit="return confirm('Bạn muốn xóa')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>                        
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
