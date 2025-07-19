<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address',
        'city',
        'zip',
        'state',
        'country',
        'total_price',
        'payment_method',
        'status',
    ];

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
