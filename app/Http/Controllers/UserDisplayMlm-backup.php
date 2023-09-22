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
            $downlineUsers = $this->getDownlineUsers($currentUser->generatedId, 1);
            $bonus = $this->calculateBonus($downlineUsers);
        
          
            $data = [
                'user' => $currentUser,
                'sponsor' => $sponsor,
                'downlineUsers' => [
                    'user' => $currentUser,
                    'downline' => $downlineUsers['downline'],
                    'bonus' => $bonus, 
                ],
            ];
        
            return view('tree.index', $data);
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
            $result[$user->generatedId] = [
                'user' => $user,
                'levelUser' =>  $level,
                'acountStatus' =>  $acountStatus,
                'downline' => $this->getDownlineUsers($user->generatedId, $level + 1),
            ];
        }

        return $result;
    }

    private function calculateBonus($downlineUsers)
    {
        $bonus = 0;
        $currentLevel = 0;
    
        foreach ($downlineUsers as $userId => &$data) {
            $data['bonus'] = 0; 
    
            if ($data['levelUser'] <= 8 && $data['user']->acountStatus == 'active') {
                $data['bonus'] = 100; 
            }
    
            $bonus += $data['bonus'];
    
            $bonus += $this->calculateBonus($data['downline']);
        }
    
        return $bonus;
    }
    


    


}