@extends('layouts.admin.app')
@section('content')
    <h2>Báo cáo thống kê</h2>
    <div class="dashboard-cards">
        <div class="card">
            <h4>Tổng khách hàng</h4>
            <p class="number">50</p>
        </div>
        <div class="card">
            <h4>Món đang bán</h4>
            <p class="number">10</p>
        </div>
        <div class="card">
            <h4>Doanh thu</h4>
            <p class="number">10.000.000</p>
        </div>
        <div class="card">
            <h4>Đơn hàng đang chờ</h4>
            <p class="number">20</p>
        </div>
    </div>
    <div class="chart-box">
        <h3>Số đơn hàng theo tháng</h3>
        <canvas id="orderChart"></canvas>
    </div>
    <style>

        .dashboard-cards{
            display:flex;
            gap:20px;
            margin-bottom:30px;
        }

        .card{
            background:#f5f5f5;
            padding:20px;
            border-radius:10px;
            width:200px;
            box-shadow:0 2px 6px rgba(0,0,0,0.1);
        }

        .number{
            font-size:24px;
            font-weight:bold;
        }

        .chart-box{
            background:#fff;
            padding:20px;
            border-radius:10px;
            box-shadow:0 2px 6px rgba(0,0,0,0.1);
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        const ctx = document.getElementById('orderChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T11','T12'],
                datasets: [{
                    label: 'Số đơn hàng',
                    data: [5,10,7,12,8,14,9,11,6,15,10,13],
                    backgroundColor: '#4e73df'
                }]
            }
        });
    </script>
@endsection