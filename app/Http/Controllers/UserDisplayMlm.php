<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sponsorTree;

use Illuminate\Support\Facades\DB;


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
            $bonus = $this->calculateBonus($downlineUsers, $currentUser->level);

        }
    
        return view('tree.index', [
            'user' => $currentUser,
            'sponsor' => $sponsor,
            'downlineUsers' => [
                'user' => $currentUser,
                'downline' => $downlineUsers,
                'bonus' => $bonus,
            ],
        ]);
        
    }

}

    private function getDownlineUsers($sponsorId, $level)
    {

        $currentUser = auth()->user();
    
        $downlineUsers = sponsorTree::where('sponsor_id_number', $sponsorId)->get();

        if ($level >= 20 || $downlineUsers->isEmpty()) {
            return [];
        }
        
        $result = [];

        if ($currentUser->generatedId) {
            $bonus = $this->calculateBonus($downlineUsers, $currentUser->level);

        }


        foreach ($downlineUsers as $user) {
            $result[$user->generatedId] = [
                'user' => $user,
                'levelUser' =>  $level,
                'downline' => $this->getDownlineUsers($user->generatedId, $level + 1),
                'bonus' => $bonus,
            ];
        }


        return $result;
    }



    private function calculateBonus($sponsorId, $levelUser)
    {
        $bonus = 0;
        $currentUser = auth()->user();

        if ($currentUser->generatedId) {
            $sponsorId = $currentUser->generatedId; 
            
            $count = sponsorTree::where('sponsor_id_number', $sponsorId)
                ->where('acountStatus', 'active')
                ->count();
            $bonus = $count * 100;
        }
    
        return $bonus;
    }
    


    


} 