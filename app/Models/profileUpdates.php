<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profileUpdates extends Model
{
    use HasFactory;

    protected $table = 'users'; 

    protected $primaryKey = 'id'; 

    protected $id = 'id'; 


    protected $fillable = [
        'name',
        'lastname',
        'email',
        'presentAddress',
        'birthday',
        'status',
        'gender',
        'nationality',
        'company',
        'phoneNumber',
        'zipcode',
        'city',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];



}
