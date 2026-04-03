<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'code',
        'total',
        'payment_method',
        'status',
        'name',
        'phone',
        'address'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}