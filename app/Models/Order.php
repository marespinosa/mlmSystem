<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'total_amount', 'status'];

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define the relationship with the 'order_items' table
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}