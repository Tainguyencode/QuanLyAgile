<style>
    .brand-text {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: #4a3728;
        font-size: 24px;
    }

    .nav-custom {
        color: #4a3728;
        font-size: 14px;
        text-transform: uppercase;
    }

    .nav-custom:hover { color: #c9a67e; }

    .navbar-brand {
        padding-top: 0;
        padding-bottom: 0;
        margin-top: -10px; 
        margin-bottom: -8px;
    }

    /* Đảm bảo các link menu vẫn căn giữa theo chiều dọc */
    .nav-link {
        line-height: 1; 
        display: flex;
        align-items: center;
    }
    .custom-dropdown {
        position: absolute;
        top: 100%;
        left: 0;
        background: #fdf5e6;
        border-radius: 10px;
        min-width: 200px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: 0.25s;
        display: block;
    }

    .dropdown-hover:hover .custom-dropdown {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .banner-img {
        height: 580px;
        background-size: cover;
        background-position: center;
    }

    .banner-overlay {
        background: linear-gradient(to right, rgba(0,0,0,0.6), transparent);
        height: 100%;
        display: flex;
        align-items: center;
        color: white;
    }

    .banner-overlay h2 {
        font-size: 3.5rem;
        font-family: 'Playfair Display', serif;
    }

    .banner-overlay span { color: #ffca28; }

    .small-badge {
        position: absolute;
        top: -5px;
        right: -10px;
        font-size: 10px;
    }
    .user-text {
        color: #4a3728;
        text-decoration: none;
    }

    .user-text:hover {
        text-decoration: none;
        color: #c9a67e; /* optional hover đẹp hơn */
    }
    .features-section {
        background: #f4ede4;
        padding: 60px 0;    
    }

    .feature-card {
        background: #fff;
        padding: 30px 20px;
        border-radius: 20px;
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.05);
    }

    .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.08);
    }

    .feature-card .icon {
        font-size: 40px;
        margin-bottom: 15px;
    }

    .feature-card h3 {
        font-family: 'Playfair Display', serif;
        font-size: 20px;
        margin-bottom: 10px;
        color: #4a3728;
    }

    .feature-card p {
        font-size: 14px;
        color: #777;
    }
</style>

<nav class="navbar navbar-expand-lg sticky-top" style="background-color: #fdf5e6; border-bottom: 1px solid #e8e0d5; padding: 15px 50px;">
    <div class="container-fluid">

        <a class="navbar-brand d-flex align-items-center" href="">
            <img src="{{ asset('uploads/user/Logo.png') }}" alt="Logo" width="70" height="70" class="me-2">
            <span class="brand-text">FASBITE</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#userNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center fw-bold" id="userNavbar">
            <ul class="navbar-nav gap-4">

                <li class="nav-item"><a class="nav-link nav-custom" href="/">Trang chủ</a></li>

                <li class="nav-item dropdown dropdown-hover position-relative">
                    <a class="nav-link dropdown-toggle nav-custom" href="javascript:void(0)">Thực đơn</a>

                    <ul class="dropdown-menu custom-dropdown">
                        @foreach($menuProducts as $product)
                            <li><a class="dropdown-item" href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></li>
                        @endforeach
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-center view-all" href="/menu">Xem tất cả</a></li>
                    </ul>
                </li>

                <li class="nav-item"><a class="nav-link nav-custom" href="#">Dịch vụ</a></li>
                <li class="nav-item"><a class="nav-link nav-custom" href="#">Câu chuyện</a></li>
                <li class="nav-item"><a class="nav-link nav-custom" href="#">Liên hệ</a></li>

            </ul>
        </div>

        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('cart.index') }}" class="position-relative text-decoration-none">
                🛒
                <span class="badge bg-warning text-dark small-badge">
                    {{ \Illuminate\Support\Facades\DB::table('carts')
                        ->where('user_id', Auth::id())
                        ->sum('quantity') }}
                </span>
            </a>

            @if(Auth::check())
                <a href="{{ route('client.profile') }}" class="user-text  text-decoration-none">Chào, {{ Auth::user()->name }}</a>
            @else
                <a href="/login" class="btn btn-sm btn-outline-dark rounded-pill px-3">Đăng nhập</a>
            @endif
        </div>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill">
                Đăng xuất
            </button>
        </form>

    </div>
</nav>


<div id="bannerCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="2000">

    <div class="carousel-inner">

        <div class="carousel-item active">
            <div class="banner-img" style="background-image: url('https://images.unsplash.com/photo-1513104890138-7c749659a591');">
                <div class="banner-overlay">
                    <div class="container">
                        <h2>Pizza Hải Sản <br><span>Mềm thơm ngậy</span></h2>
                        <p>Ưu đãi mua 1 tặng 1 mỗi thứ 3</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <div class="banner-img" style="background-image: url('https://images.unsplash.com/photo-1550547660-d9450f859349');">
                <div class="banner-overlay">
                    <div class="container">
                        <h2>Burger Bò <br><span>Thượng Hạng</span></h2>
                        <p>Nguyên liệu nhập khẩu</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <div class="banner-img" style="background-image: url('https://images.unsplash.com/photo-1622483767028-3f66f32aef97');">
                <div class="banner-overlay">
                    <div class="container">
                        <h2>Giải Nhiệt <br><span>Tức Thì</span></h2>
                        <p>Combo từ 25.000đ</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<section id="features" class="features-section">
    <div class="container">
        <div class="row text-center g-4">

            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon">🛵</div>
                    <h3>Giao Hàng Siêu Tốc</h3>
                    <p>Chỉ từ 15–20 phút, đồ ăn nóng hổi đến tận tay bạn.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon">🍔</div>
                    <h3>Nguyên Liệu Tươi Mới</h3>
                    <p>Chế biến ngay khi đặt, đảm bảo độ tươi ngon mỗi ngày.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon">🔥</div>
                    <h3>Hương Vị Chuẩn Quán</h3>
                    <p>Công thức riêng, đậm đà như ăn tại cửa hàng.</p>
                </div>
            </div>

        </div>
    </div>
</section>
