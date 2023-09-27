<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\sponsorTree;
use App\Models\checkoutModel;
use App\Models\ordersModel;


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
    ];

    public function sponsorTree()
    {
        return $this->belongsTo(sponsorTree::class, 'users_id');
    }

    public function ordersModel()
    {
        return $this->belongsTo(ordersModel::class, 'orderitems_id'); 
    } 

    public function checkoutModel()
    {
        return $this->belongsTo(checkoutModel::class, 'orders_id'); 
    } 


    

  

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }



    
}


