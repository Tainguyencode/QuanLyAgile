@extends('layouts.admin.app')

@section('content')
    <div class="container">

        <h2 class="mb-4">📦 Quản lý đơn hàng</h2>

        <!-- Filter -->
        <form method="GET" class="mb-3 d-flex gap-2">
            <select name="status" class="form-control w-25">
                <option value="">-- Trạng thái --</option>
                <option value="pending">Chờ xử lý</option>
                <option value="processing">Đang xử lý</option>
                <option value="shipped">Đang giao</option>
                <option value="completed">Hoàn thành</option>
                <option value="cancelled">Đã hủy</option>
            </select>

            <button class="btn btn-primary">Lọc</button>
        </form>

        <!-- Table -->
        <div class="card shadow rounded-4">
            <div class="card-body">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Khách hàng</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Thanh toán</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td><b>#{{ $order->id }}</b></td>

                                <td>{{ $order->code }}</td>

                                <td>{{ $order->name }}</td>

                                <td class="text-danger fw-bold">
                                    {{ number_format($order->total) }}đ
                                </td>

                                <!-- Badge trạng thái -->
                                <td>
                                    <span
                                        class="badge 
                                @if ($order->status == 'pending') bg-warning
                                @elseif($order->status == 'processing') bg-info
                                @elseif($order->status == 'shipped') bg-primary
                                @elseif($order->status == 'completed') bg-success
                                @else bg-danger @endif
                            ">
                                        {{ $order->status }}
                                    </span>
                                </td>

                                <!-- Payment -->
                                <td>
                                    <span
                                        class="badge 
                                {{ $order->payment_status == 'paid' ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $order->payment_status }}
                                    </span>
                                </td>

                                <td>
                                    <a href="{{ url('admin/orders/' . $order->id) }}" class="btn btn-sm btn-dark">
                                        Xem
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $orders->links() }}
            </div>
        </div>

    </div>
@endsection
