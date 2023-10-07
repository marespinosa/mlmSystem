<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\checkoutModel;
use App\Models\sponsorTree;
use App\Models\ProductModel;
use App\Models\OrdersShow;


class ordersModel extends Model
{
    use HasFactory;

    protected $table = 'orderitems'; 

    protected $primaryKey = 'id'; 

    protected $id = 'id'; 

    protected $fillable = [ 
        'orders_id',
        'products_id',
        'product_name',
        'item_price',
        'quantity',
        'subtotal',
    ];

    public function sponsorTree()
    {
        return $this->belongsTo(sponsorTree::class, 'users_id');
    }

    public function ProductModel()
    {
        return $this->belongsTo(ProductModel::class, 'products_id'); 
    } 

    public function checkoutModel()
    {
        return $this->belongsTo(checkoutModel::class, 'orders_id'); 
    } 

    public function OrdersShow()
    {
        return $this->belongsTo(OrdersShow::class, 'orderitems_id');
    }

    public function order()
    {
        return $this->belongsTo(OrdersShow::class, 'orders_id', 'id');
    }





}
