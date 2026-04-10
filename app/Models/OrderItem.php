<?php

namespace App\Models;

use App\Models\Admin\Products;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'name',
        'image',
        'price',
        'quantity'
    ];

        public function product()
    {
        return $this->belongsTo(Products::class);
    }

}
