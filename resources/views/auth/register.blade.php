<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h2>Đăng ký</h2>

<form method="POST" action="/register">
@csrf

Tên <br>
<input type="text" name="name" value="{{ old('name') }}">
<br>
@error('name')
<span style="color:red">{{ $message }}</span>
@enderror
<br><br>

Email <br>
<input type="email" name="email" value="{{ old('email') }}">
<br>
@error('email')
<span style="color:red">{{ $message }}</span>
@enderror
<br><br>

Password <br>
<input type="password" name="password">
<br>
@error('password')
<span style="color:red">{{ $message }}</span>
@enderror
<br><br>

Nhập lại Password <br>
<input type="password" name="password_confirmation">
<br>
@error('password_confirmation')
<span style="color:red">{{ $message }}</span>
@enderror
<br><br>

<button type="submit">Register</button>

</form>

<br>

<a href="/login">Đã có tài khoản? Đăng nhập</a>

</body>
</html>