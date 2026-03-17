@extends('layouts.admin.app')
@section('content')

<h2>Danh sách tài khoản</h2>
<a href="{{ route('user.create') }}" class="btn btn-sm btn-success">+ Thêm mới tài khoản</a>
    <table class="table">
        <thead>
            <tr>
                <td>Id</td>
                <td>Tên tài khoản</td>
                <td>Email</td>
                <td>Số điện thoại</td>
                <td>Phân quyền</td>
                <td>Hành động</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('user.show', ['id' => $user->id]) }}" class="btn btn-primary">Xem</a>
                            <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('user.destroy', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data" 
                                onsubmit="return confirm('Bạn có chắc chắn muốn xóa!')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Xóa</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection