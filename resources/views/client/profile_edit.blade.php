@extends('layouts.user.app')

@section('content')
<div class="container mt-5">
    <div class="card p-4 shadow rounded-4">
        <h3 class="mb-4">Cập nhật hồ sơ</h3>

        <form action="{{ route('client.profile.update') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Tên</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>

            <div class="mb-3">
                <label>Số điện thoại</label>
                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
            </div>

            <!-- Không cho sửa role -->
            <div class="mb-3">
                <label>Vai trò</label>
                <input type="text" class="form-control" value="{{ $user->role }}" disabled>
            </div>

            <hr>

            <div class="mb-3">
                <label>Mật khẩu mới (không bắt buộc)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label>Nhập lại mật khẩu</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">
                Cập nhật
            </button>
        </form>
    </div>
</div>
@endsection