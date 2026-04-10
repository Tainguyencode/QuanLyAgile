@extends('layouts.admin.app')

@section('content')
    <div class="container">

        <h3>🧾 Đơn hàng {{ $order->code }}</h3>

        <div class="row mt-4">

            <!-- Thông tin -->
            <div class="col-md-4">
                <div class="card p-3 shadow rounded-4">
                    <h5>Thông tin khách hàng</h5>
                    <p><b>{{ $order->name }}</b></p>
                    <p> {{ $order->address }}</p>
                    <p> {{ $order->phone }}</p>

                    <hr>

                    <p>Tổng tiền:</p>
                    <h4 class="text-danger">
                        {{ number_format($order->total) }}đ
                    </h4>
                </div>
            </div>

            <!-- Update -->
            <div class="col-md-4">
                <div class="card p-3 shadow rounded-4">
                    <h5>Cập nhật trạng thái</h5>

                    <form method="POST" action="{{ url('admin/orders/' . $order->id . '/update') }}">
                        @csrf

                        <label>Trạng thái đơn</label>
                        <select name="status" class="form-control mb-2">
                            <option value="pending">Chờ xử lý</option>
                            <option value="processing">Đang xử lý</option>
                            <option value="shipped">Đang giao</option>
                            <option value="completed">Hoàn thành</option>
                            <option value="cancelled">Hủy</option>
                        </select>

                        <label>Thanh toán</label>
                        <select name="payment_status" class="form-control mb-3">
                            <option value="unpaid">Chưa thanh toán</option>
                            <option value="paid">Đã thanh toán</option>
                        </select>

                        <button class="btn btn-success w-100">
                            Cập nhật
                        </button>
                    </form>
                </div>
            </div>

        </div>

        <!-- Sản phẩm -->
        <div class="card mt-4 shadow rounded-4">
            <div class="card-body">
                <h5>Sản phẩm trong đơn</h5>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($order->orderDetails as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td> 
                                    <img src="{{ asset('uploads/products/' . $item->image) }}" width="80">
                                </td>
                                <td>{{ $item->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><br>
        <div class="mb-3">
            <a href="{{ route('orders') }}" class="btn btn-sm btn-secondary"> Quay lại</a>
        </div>

    </div>
@endsection
