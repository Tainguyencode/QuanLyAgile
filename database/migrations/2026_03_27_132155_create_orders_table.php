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

            // User đặt hàng
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // Tổng tiền
            $table->decimal('total', 10, 2);

            // Trạng thái đơn hàng
            $table->string('status')->default('pending');
            // pending | processing | completed | cancelled

            // Thông tin nhận hàng (optional)
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
