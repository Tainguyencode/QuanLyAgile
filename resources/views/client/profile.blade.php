@extends('layouts.user.app')

@section('content')

<style>
    .profile-card {
        border-radius: 20px;
        background: #fff;
        border: 1px solid #eee;
    }

    .profile-title {
        font-family: 'Playfair Display', serif;
        color: #4a3728;
    }

    .profile-item {
        padding: 12px 15px;
        border-radius: 12px;
        background: #f9f5f0;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .profile-item i {
        width: 30px;
        height: 30px;
        background: #c9a67e;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }

    .btn-back {
        text-decoration: none;
        color: #4a3728;
        font-weight: 500;
    }

    .btn-back:hover {
        color: #c9a67e;
    }
</style>

<div class="container mt-4">
    <a href="{{ route('client.home') }}" class="btn-back mb-3 d-inline-block">
        <i class="fas fa-arrow-left me-2"></i> Quay lại
    </a>
    <div class="card profile-card shadow p-4">
        <h3 class="mb-4 profile-title">
            <i class="fas fa-user-circle me-2"></i> Hồ sơ cá nhân
        </h3>

        <div class="profile-item">
            <i class="fas fa-user"></i>
            <span><strong>Tên:</strong> {{ $user->name }}</span>
        </div>

        <div class="profile-item">
            <i class="fas fa-envelope"></i>
            <span><strong>Email:</strong> {{ $user->email }}</span>
        </div>

        <div class="profile-item">
            <i class="fas fa-phone"></i>
            <span><strong>Số điện thoại:</strong> {{ $user->phone }}</span>
        </div>

        <div class="profile-item">
            <i class="fas fa-user-shield"></i>
            <span><strong>Vai trò:</strong> {{ $user->role }}</span>
        </div>

    </div>

</div>

@endsection