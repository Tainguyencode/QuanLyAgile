@extends('layouts.admin.app')
@section('content')
    <h2>Danh sách danh mục</h2>
    <table class="table">
        <thead>
            <tr>
                <td>Id</td>
                <td>Ảnh danh mục</td>
                <td>Tên danh mục</td>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>
                        <img src="{{ asset($category->image) }}" alt="Hình ảnh sản phẩm" width="100">
                    </td>
                    <td>{{ $category->name }}</td>
                </tr>
        </tbody>
    </table>

        <a href="{{ route('admin.category.index') }}">Quay lại</a>

@endsection
