<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\sponsorTree;
use App\Models\ordersModel;
use App\Models\ProductModel;


class OrdersShow extends Model
{
    use HasFactory;

    protected $table = 'orders';

   
    public function ordersAll()
    {
        return $this->belongsTo(ordersModel::class, 'orderitems_id');
    }

    public function sponsorTree()
    {
        return $this->belongsTo(sponsorTree::class, 'users_id');
    }

    public function ProductModel()
    {
        return $this->belongsTo(ProductModel::class, 'products_id'); 
    } 


    public function orderItems()
    {
        return $this->hasMany(ordersModel::class, 'orders_id', 'id');
    }


}
