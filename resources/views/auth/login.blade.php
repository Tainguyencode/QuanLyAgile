<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Đăng nhập</h2>

<form method="POST" action="/login">
@csrf

Email
<input type="email" name="email"><br>

@error('email')
<span style="color:red">{{ $message }}</span>
@enderror
<br><br>

Password
<input type="password" name="password"><br>
@error('password')
<span style="color:red">{{ $message }}</span>
@enderror
<br><br>

<button type="submit">Login</button>

</form>

<br>
@if(session('error'))
<p style="color:red">{{ session('error') }}</p>
@endif
<a href="/register">Chưa có tài khoản? Đăng ký</a>

</body>
</html>