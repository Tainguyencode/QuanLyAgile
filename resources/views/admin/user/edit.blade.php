@extends('layouts.admin.app')
@section('content')
    <h2>Sửa tài khoản mới có Id: {{ $user->id }}</h2>
    <div class="card">
        <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data" class="form-control">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="form-label">Tên Tài Khoản:</label>
                <input type="text" name="name" placeholder="Mời bạn nhập tên tài khoản...." value="{{ $user->name }}">
                @error('name')
                    <p style="color:red">{{ $message }}</p>
                 @enderror
            </div>
            <div class="mb-3">
                <label for="form-label">Email:</label>
                <input type="email" name="email" placeholder="Mời bạn nhập tên email...." value="{{ $user->email }}">
                @error('email')
                    <p style="color:red">{{ $message }}</p>
                 @enderror
            </div>
            <div class="mb-3">
                <label for="form-label">Số điện thoại:</label>
                <input type="text" name="phone" value="{{ $user->phone }}">
                @error('phone')
                    <p style="color:red">{{ $message }}</p>
                 @enderror
            </div>
            <div class="mb-3">
                <label for="form-label">Mật khẩu:</label>
                <input type="password" name="password" placeholder="Nhập nếu muốn đổi mật khẩu...">
                @error('password')
                    <p style="color:red">{{ $message }}</p>
                 @enderror
            </div>
            <div class="mb-3">
                <label for="form-label">Nhập lại mật khẩu:</label>
                <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu mới đổi...">
                @error('password_confirmation')
                    <p style="color:red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="form-label">Phân quyền:</label>
                <select name="role">
                    <option value="">-- Chọn quyền --</option>
                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')
                    <p style="color:red">{{ $message }}</p>
                @enderror
            </div>
            <a href="{{route('user')}}" class="btn btn-sm btn-secondary"> Quay lại</a>
            <button type="submit" class="btn btn-sm btn-success">Lưu</button>
        </form>
    </div>
@endsection