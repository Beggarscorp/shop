<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Products;
use App\Models\Orders;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'quantity',
        'price',
        'total',
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
