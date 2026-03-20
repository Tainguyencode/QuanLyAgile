<!DOCTYPE html>

<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body{
        margin:0;
        height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
        font-family: 'Segoe UI', sans-serif;

        background:
            linear-gradient(135deg, rgba(255,126,95,0.17), rgba(254,180,123,0.17)),
            url('https://images.unsplash.com/photo-1550547660-d9450f859349');
        background-size: cover;
        background-position: center;
        overflow:hidden;
    }

    body::before, body::after{
        content:"";
        position:absolute;
        border-radius:50%;
        filter: blur(100px);
        opacity:0.6;
    }

    body::before{
        width:300px;
        height:300px;
        background:#ff3d3d;
        top:-50px;
        left:-50px;
        animation: float 6s infinite alternate;
    }

    body::after{
        width:400px;
        height:400px;
        background:#ffcc00;
        bottom:-100px;
        right:-100px;
        animation: float 8s infinite alternate;
    }

    @keyframes float{
        from{ transform: translateY(0px); }
        to{ transform: translateY(40px); }
    }

    .register-box{
        width:480px;
        z-index:2;
    }

    .card{
        border-radius:15px;
        backdrop-filter: blur(10px);
        background: rgba(255,255,255,0.9);
    }

    .btn{
        transition:0.3s;
    }

    .btn:hover{
        transform: scale(1.05);
    }

    .floating-food{
        position:absolute;
        font-size:40px;
        animation: float 5s infinite alternate;
        opacity:0.3;
    }

    .floating-food:nth-child(1){
        top:10%;
        left:10%;
    }

    .floating-food:nth-child(2){
        bottom:10%;
        right:15%;
    }
        /* CARD (form box) */
    .card {
        border-radius: 20px;
        backdrop-filter: blur(15px);
        background: rgba(255, 255, 255, 0.85);
        border: none;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    /* HEADER */
    .card-header {
        background: transparent;
        border-bottom: none;
        font-weight: 600;
        font-size: 20px;
    }

    /* INPUT */
    .form-control {
        border-radius: 10px;
        padding: 10px 12px;
        border: 1px solid #ddd;
        transition: all 0.3s;
    }

    /* focus input */
    .form-control:focus {
        border-color: #ff7e5f;
        box-shadow: 0 0 0 2px rgba(255,126,95,0.2);
    }

    /* LABEL */
    .form-label {
        font-weight: 500;
        margin-bottom: 5px;
    }

    /* BUTTON */
    .btn {
        border-radius: 10px;
        padding: 10px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    /* BUTTON LOGIN */
    .btn-primary {
        background: linear-gradient(135deg, #ff7e5f, #feb47b);
        border: none;
    }

    /* BUTTON REGISTER */
    .btn-success {
        background: linear-gradient(135deg, #43cea2, #185a9d);
        border: none;
    }

    /* hover button */
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    /* FOOTER LINK */
    .card-footer {
        background: transparent;
        border-top: none;
    }

    .card-footer a {
        text-decoration: none;
        color: #ff7e5f;
        font-weight: 500;
    }

    .card-footer a:hover {
        text-decoration: underline;
    }

    /* ERROR TEXT */
    .text-danger {
        font-size: 14px;
    }

    /* ALERT */
    .alert {
        border-radius: 10px;
    }
</style>

</head>
<body>

<div class="register-box">

    <div class="card shadow">

        <div class="card-header text-center">
            <h3><img src="{{ asset('uploads/user/Logo.png') }}" alt="Logo" width="60" height="60" class="me-2">Fasbite - Đăng ký tài khoản</h3>
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
