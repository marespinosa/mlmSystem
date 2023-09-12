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
        'price',
        'sku',
        'quantity',
        'user_id',
    ];
    


}
