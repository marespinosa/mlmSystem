<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkoutModel extends Model
{
    use HasFactory;

    protected $table = 'users'; 

    protected $primaryKey = 'id'; 

    protected $id = 'id'; 


    protected $fillable = [ 
        'firstName',
        'lastName',
        'phonenumber',
        'address',
        'address2',
        'zipcode',
        'city',
    ];


}
