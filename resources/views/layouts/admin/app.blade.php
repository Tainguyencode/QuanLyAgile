<!DOCTYPE html>
<html lang="vi">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Admin - Đồ ăn nhanh</title>

    <style>
        body{
            margin:0;
            font-family: Arial;
            background-color: #f8fafc;
        }

        .header {
            background: #334155; 
            color: #ffffff;
            padding: 15px;
            font-size: 22px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1); /* Đường kẻ mờ để tách biệt */
        }

        .sidebar {
            width: 220px;
            background: #475569; 
            color: white;
            padding: 15px;
            min-height: 100vh;
        }
        .header h4 {
            color: #ffffff !important;
            margin: 0;
        }

        .admin-layout{
            display:flex;
            min-height:90vh;
        }

        .sidebar{
            width:220px;
            background:#475569;
            color:white;
            padding:15px;
            min-height:100vh;
        }
        .sidebar h3 {
            color: #bfd1ef; 
            font-size: 1.2rem;
            margin-bottom: 20px;
        }
        .sidebar a{
            display:block;
            color:white;
            text-decoration:none;
            padding:10px;
            margin-bottom:5px;
        }

        .sidebar a:hover{
            background: #334155; 
            color: #38bdf8; 
        }

        .content{
            background: #f8fafc;
            flex:1;
            padding:20px;
        }

        .footer{
            background:#ddddddb4;
            padding:10px;
            text-align:center;
        }
    </style>

    </head>
    <body>

        @include('layouts.admin.header')

        <div class="admin-layout">

            @include('layouts.admin.aside')

            <div class="content">
                @yield('content')
            </div>

        </div>

    @include('layouts.admin.footer')

</body>
</html>