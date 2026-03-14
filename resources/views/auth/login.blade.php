<!DOCTYPE html>

<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body{
        background:#f4f6f9;
        height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
    }

    .login-box{
        width:400px;
    }

    .card{
        border-radius:10px;
    }
</style>

</head>
<body>

<div class="login-box">

<div class="card shadow">

<div class="card-header text-center">
<h3>Đăng nhập</h3>
</div>

<div class="card-body">

<form method="POST" action="/login">
@csrf

<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control">

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

@if(session('error'))

<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif

<div class="d-grid">
<button type="submit" class="btn btn-primary">Login</button>
</div>

</form>

</div>

<div class="card-footer text-center">
<a href="/register">Chưa có tài khoản? Đăng ký</a>
</div>

</div>

</div>

</body>
</html>
