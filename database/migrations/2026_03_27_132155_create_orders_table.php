<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // user
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // mã đơn (QUAN TRỌNG)
            $table->string('code')->unique();

            // tổng tiền
            $table->decimal('total', 10, 2);

            // phương thức thanh toán
            $table->string('payment_method'); // cod | qr

            // trạng thái
            $table->string('status')->default('pending');
            // pending | waiting_payment | processing | completed | cancelled

            // thông tin nhận hàng
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();

            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
