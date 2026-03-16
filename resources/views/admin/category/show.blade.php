@extends('layouts.admin.app')
@section('content')
    <h2>Danh sách danh mục</h2>
    <table class="table">
        <thead>
            <tr>
                <td>Ảnh danh mục</td>
                <td>Tên danh mục</td>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>
                        <img src="{{ asset('uploads/categories/'. $category->image) }}" alt="Hình ảnh sản phẩm" width="100">
                    </td>
                    <td>{{ $category->name }}</td>
                </tr>
        </tbody>
    </table>

        <a href="{{ route('category') }}">Quay lại</a>

@endsection
