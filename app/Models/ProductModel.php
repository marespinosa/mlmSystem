<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductModel extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id';

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
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }


}