<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\checkoutModel;

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

    public function purchases()
    {
        return $this->hasMany(checkoutModel::class, 'user_id'); // Adjust the foreign key column name if needed
    }

}
