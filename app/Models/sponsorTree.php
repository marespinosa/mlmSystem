<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\checkoutModel;
use App\Models\ordersModel;
use App\Models\ProductModel;

class sponsorTree extends Model
{
    use HasFactory;

    protected $table = 'users'; 

    protected $primaryKey = 'id'; 

    protected $id = 'id'; 

    protected $sponsorId = 'sponsor_id_number';
    
    protected $generatedId = 'generatedId'; 


    protected $fillable = [
        'name',
        'lastname',
        'email',
        'generatedId', 
        'sponsor_id_number',
        'acountStatus', 
    ];

   
    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    public function ProductModel()
    {
        return $this->belongsTo(ProductModel::class, 'products_id');
    }

    public function ordersModel()
    {
        return $this->belongsTo(ordersModel::class, 'orderitems_id'); 
    } 

    public function checkoutModel()
    {
        return $this->belongsTo(checkoutModel::class, 'orders_id'); 
    } 




    
}
