<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\sponsorTree;

class checkoutModel extends Model
{
    use HasFactory;

    protected $table = 'orders'; 

    protected $primaryKey = 'id'; 

    protected $id = 'id'; 


    protected $fillable = [ 
        'users_id', 
        'total_amount',
        'firstName',
        'lastName',
        'phonenumber',
        'address',
        'address2',
        'zipcode',
        'city',
        'status',
    ];


    public function sponsorTree()
    {
        return $this->belongsTo(SponsorTree::class, 'user_id'); // Adjust the foreign key column name if needed
    } 



}
