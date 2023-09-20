<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sponsorTree; 

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class UserDisplayMlm extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function CurrentSponsor()
{
        $currentUser = auth()->user();
        $sponsor = null;

    
    if ($currentUser->generatedId) {
   
        $downlineUsers = [];

        if ($currentUser->generatedId) {
            $downlineUsers = $this->getDownlineUsers($currentUser->generatedId, 1);
        }
    
        return view('tree.index', [
            'user' => $currentUser,
            'sponsor' => $sponsor,
            'downlineUsers' => [
                'user' => $currentUser,
                'downline' => $downlineUsers,
            ],
        ]);
        
    }

}

private function getDownlineUsers($sponsorId, $level)
{
    $downlineUsers = sponsorTree::where('sponsor_id_number', $sponsorId)->get();

    if ($level >= 20 || $downlineUsers->isEmpty()) {
        return [];
    }

    $result = [];

    foreach ($downlineUsers as $user) {
        $lastCheckoutDate = $user->orders_id; 
        $daysSinceLastCheckout = now()->diffInDays($lastCheckoutDate);

        if ($daysSinceLastCheckout <= 30) {
            $result[$user->generatedId] = [
                'user' => $user,
                'levelUser' => $level,
                'downline' => $this->getDownlineUsers($user->generatedId, $level + 1),
            ];
        } else {
            // User has not checked out within the last 30 days, so skip them
        }
    }

    return $result;
}



    


}