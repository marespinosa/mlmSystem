<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\checkoutModel;
use App\Models\ordersModel;
use App\Models\ProductModel;

class ordersModel extends Model
{
    use HasFactory;

    protected $table = 'orderitems'; 

    protected $primaryKey = 'id'; 

    protected $id = 'id'; 


    protected $fillable = [ 
        'orders_id',
        'products_id',
        'price',
        'quantity',
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



}
