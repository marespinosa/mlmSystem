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

        $downlineUsers = sponsorTree::where('sponsor_id_number', $sponsorId)
        ->where('acountStatus', 'active')
        ->get();


        if ($level >= 20 || $downlineUsers->isEmpty()) {
            return [];
        }

        $result = [];

        foreach ($downlineUsers as $user) {
            $result[$user->generatedId] = [
                'user' => $user,
                'downline' => $this->getDownlineUsers($user->generatedId, $level + 1),
            ];
        }

        return $result;
    }



    


}