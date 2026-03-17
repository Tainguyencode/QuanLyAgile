@extends('layouts.admin.app')
@section('content')
    <h1>Chi tiết tài khoản</h1>
    <ul>
        <li>Tên tài khoản: {{ $user->name }}</li>
        <li>Email tài khoản:{{ $user->email}}</li>
        <li>Số điện thoại: {{ $user->phone }}</li>
        <li>Phân quyền: {{ $user->role }}</li>
    </ul>
    <a href="{{ route('user') }}" class="btn btn-primary">Quay lại danh sách tài khoản</a>
@endsection