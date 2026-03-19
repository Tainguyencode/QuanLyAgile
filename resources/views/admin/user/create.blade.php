@extends('layouts.admin.app')
@section('content')
    <h2>Thêm tài khoản mới</h2>
    <div class="card">
        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data" class="form-control">
            @csrf
            <div class="mb-3">
                <label for="form-label">Tên Tài Khoản:</label>
                <input type="text" name="name" placeholder="Mời bạn nhập tên tài khoản...." value="{{ old('name') }}">
                @error('name')
                    <p style="color:red">{{ $message }}</p>
                 @enderror
            </div>
            <div class="mb-3">
                <label for="form-label">Email:</label>
                <input type="email" name="email" placeholder="Mời bạn nhập tên email...." value="{{ old('email') }}">
                @error('email')
                    <p style="color:red">{{ $message }}</p>
                 @enderror
            </div>
            <div class="mb-3">
                <label for="form-label">Số điện thoại:</label>
                <input type="text" name="phone" value="{{ old('phone') }}">
                @error('phone')
                    <p style="color:red">{{ $message }}</p>
                 @enderror
            </div>
            <div class="mb-3">
                <label for="form-label">Mật khẩu:</label>
                <input type="password" name="password" placeholder="Mật khẩu phải có ít nhất 6 ký tự...." value="{{ old('password') }}">
                @error('password')
                    <p style="color:red">{{ $message }}</p>
                 @enderror
            </div>
            <div class="mb-3">
                <label for="form-label">Nhập lại mật khẩu:</label>
                <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu...">
                @error('password_confirmation')
                    <p style="color:red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="form-label">Phân quyền:</label>
                <select name="role">
                    <option value="">-- Chọn quyền --</option>
                    <option value="user" {{ old('role')=='user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>Admin</option>
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