<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FASBITE - Đồ ăn nhanh cao cấp</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    @yield('css')
    <style>
        body {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            background-color: #fdfaf7; /* Màu nền kem nhạt */
            color: #4a3728;
        }

        /* Layout chính tương tự file admin nhưng tinh chỉnh hiển thị */
        .user-layout {
            display: flex;
            min-height: 85vh;
        }

        /* Sidebar cho User (Danh mục món ăn) */
        .sidebar {
            width: 260px;
            background: #ffffff; 
            padding: 30px 20px;
            border-right: 1px solid #eee1d5;
        }

        .sidebar h3 {
            font-family: 'Playfair Display', serif;
            color: #4a3728;
            font-size: 1.4rem;
            margin-bottom: 25px;
            border-bottom: 2px solid #c9a67e;
            padding-bottom: 10px;
        }

        .sidebar a {
            display: block;
            color: #634a37;
            text-decoration: none;
            padding: 12px 15px;
            margin-bottom: 8px;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .sidebar a:hover {
            background: #f8f1e9;
            color: #c9a67e;
            padding-left: 20px;
        }

        /* Khu vực nội dung chính */
        .content {
            flex: 1;
            padding: 40px;
            background: #fdfaf7;
        }

        /* Footer cho User */
        .footer {
            background: #334155; /* Giữ tông tối của admin để tạo sự chuyên nghiệp */
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }
        /* Hiệu ứng hiển thị dropdown khi hover */
        .dropdown-hover:hover .dropdown-menu {
            display: block;
            margin-top: 0; /* Tránh khoảng cách làm mất hover */
            animation: slideUp 0.3s ease-out;
        }

        /* Hiệu ứng mượt mà */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Đổi màu khi hover vào từng món ăn trong menu */
        .dropdown-item:hover {
            background-color: #f8f1e9 !important;
            color: #c9a67e !important;
        }
        /* Đảm bảo khung bao ngoài không giới hạn chiều rộng */
        .app-wrapper {
            width: 100%;
            overflow-x: hidden;
        }

    /* Điều chỉnh kích thước Banner to hơn */
    .banner-img {
        /* Chiều cao: Bạn có thể chỉnh 600px, 700px hoặc 80vh (80% màn hình) tùy ý */
        height: 550px; 
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        width: 100vw; /* Chiều rộng full toàn bộ màn hình trình duyệt */
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
    }

    .banner-overlay {
        background: linear-gradient(to right, rgba(74, 55, 40, 0.8), rgba(0, 0, 0, 0.2));
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center; /* Căn giữa nội dung theo chiều dọc */
    }

    /* Đảm bảo container bên trong banner không bị lệch */
    .banner-overlay .container {
        height: auto !important; 
    }

    /* Phóng to tiêu đề cho tương xứng với banner to */
    .banner-overlay h2 {
        font-size: 4rem;
    }
    /* Css sản phẩm */
    .product-card {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.05);
        height: 100%;
    }

    /* Hover nổi lên */
    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }

    /* Ảnh */
    .product-img-wrapper {
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .product-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    /* Zoom ảnh khi hover */
    .product-card:hover img {
        transform: scale(1.1);
    }

    /* Nội dung */
    .product-info {
        padding: 15px;
    }

    .product-title {
        font-size: 18px;
        font-weight: 600;
        color: #4a3728;
        margin-bottom: 5px;
    }

    .product-desc {
        font-size: 13px;
        color: #888;
        margin-bottom: 10px;
    }

    /* Footer */
    .product-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Giá */
    .product-price {
        font-weight: bold;
        color: #c9a67e;
    }

    /* Nút + */
    .add-to-cart-btn {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        border: none;
        background: #f4ede4;
        color: #4a3728;
        font-size: 18px;
        transition: all 0.3s ease;
    }

    /* Hover nút */
    .add-to-cart-btn:hover {
        background: #c9a67e;
        color: #fff;
        transform: scale(1.1);
    }
    .product-card {
        animation: fadeUp 0.6s ease forwards;
        opacity: 0;
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    </style>
</head>
<body>

    @include('layouts.user.header')

    <div class="user-layout">
        
        @include('layouts.user.aside')

        <div class="content">
            @yield('content')
        </div>

    </div>

    @include('layouts.user.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>