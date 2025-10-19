<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;    
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'payment_id',
        'signature',
        'full_name',
        'email',
        'contact',
        'address',
        'city',
        'state',
        'zip_code',
        'amount',
        'currency',
        'status',
        'payment_method',
        'receipt',
        'user_id',
    ];

    // Relationship with order items
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Relationship with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
