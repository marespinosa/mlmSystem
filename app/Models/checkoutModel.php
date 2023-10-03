<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\sponsorTree;
use App\Models\ordersModel;
use App\Models\ProductModel;


class checkoutModel extends Model
{
    use HasFactory;

    protected $table = 'orders'; 

    protected $primaryKey = 'id'; 

    protected $id = 'id'; 

    protected $fillable = [ 
        'total_amount',
        'firstName',
        'lastName',
        'phonenumber',
        'address',
        'address2',
        'zipcode',
        'city',
        'payments',  
        'sponsor_id_number',
        'tracking_no',
        'status',
        'citybelongto', 
    ];

    public function sponsorTree()
    {
        return $this->belongsTo(sponsorTree::class, 'users_id');
    }

    public function ordersModel()
    {
        return $this->belongsTo(ordersModel::class, 'orderitems_id'); 
    } 

    public function ProductModel()
    {
        return $this->belongsTo(ProductModel::class, 'products_id'); 
    } 


}
