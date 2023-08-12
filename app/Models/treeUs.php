<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


use Illuminate\Database\Eloquent\Model;

class treeUs extends Model
{

    use HasFactory;

    protected $table = 'users'; 

    protected $primaryKey = 'id'; 

    protected $id = 'id'; 


    protected $fillable = [
        'name',
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

