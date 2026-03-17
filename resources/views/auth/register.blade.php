<!DOCTYPE html>

<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body{
        background:#f4f6f9;
        height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
    }

    .register-box{
        width:420px;
    }

    .card{
        border-radius:10px;
    }
</style>

</head>
<body>

<div class="register-box">

<div class="card shadow">

<div class="card-header text-center">
<h3>Đăng ký tài khoản</h3>
</div>

<div class="card-body">

<form method="POST" action="/register">
@csrf

<div class="mb-3">
<label class="form-label">Tên</label>
<input type="text" name="name" value="{{ old('name') }}" class="form-control">

@error('name')

<div class="text-danger">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
<label class="form-label">Số điện thoại</label>
<input type="text" name="phone" value="{{ old('phone') }}" class="form-control">

@error('phone')

<div class="text-danger">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" value="{{ old('email') }}" class="form-control">

@error('email')

<div class="text-danger">{{ $message }}</div>
@enderror
</div>

<div class="mb-3">
<label class="form-label">Password</label>
<input type="password" name="password" class="form-control">

@error('password')

<div class="text-danger">{{ $message }}</div>
@enderror
</div>

<div class="mb-3">
<label class="form-label">Nhập lại Password</label>
<input type="password" name="password_confirmation" class="form-control">

@error('password_confirmation')

<div class="text-danger">{{ $message }}</div>
@enderror
</div>

<div class="d-grid">
<button type="submit" class="btn btn-success">Đăng ký</button>
</div>

</form>

</div>

<div class="card-footer text-center">
<a href="/login">Đã có tài khoản? Đăng nhập</a>
</div>

</div>

</div>

</body>
</html>
