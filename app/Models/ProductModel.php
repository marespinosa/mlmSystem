<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductModel extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $id = 'id';

    protected $fillable = [
        'name',
        'descp',
        'stockistprice',
        'price',
        'srp',
        'sku',
        'quantity',
        'featured_image',
        'category',
        'user_id', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'orderitems', 'product_id', 'order_id');
    }



    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    
}


