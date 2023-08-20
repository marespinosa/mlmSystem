<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sponsorTree extends Model
{
    use HasFactory;

    protected $table = 'users'; 

    protected $primaryKey = 'id'; 

    protected $id = 'id'; 

    protected $sponsorId = 'sponsor_id_number'; 


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
}
