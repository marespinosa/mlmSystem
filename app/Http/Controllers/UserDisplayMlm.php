<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sponsorTree; 

class UserDisplayMlm extends Controller
{
  
    public function CurrentSponsor()
{
    $currentUser = auth()->user();
    $sponsor = null;

    
    if ($currentUser->generatedId) {
       
        $sponsorCurrent = sponsorTree::where('generatedId', $currentUser->generatedId)->first();
        
        $downlineUsers = []; 

        if ($currentUser) {

            $downlineUsers['level1'] = sponsorTree::where('sponsor_id_number', $currentUser->generatedId)->get();
    

            $downlineUsers['level2'] = [];
            foreach ($downlineUsers['level1'] as $level1User) {
                $level2Users = sponsorTree::where('sponsor_id_number', $level1User->generatedId)->get();
                $downlineUsers['level2'][$level1User->generatedId] = $level2Users;
    
                // Level 3 downline users
                $downlineUsers['level3'][$level1User->generatedId] = [];
                foreach ($level2Users as $level2User) {
                    $level3Users = sponsorTree::where('sponsor_id_number', $level2User->generatedId)->get();
                    $downlineUsers['level3'][$level1User->generatedId][$level2User->generatedId] = $level3Users;
                }
    
                $downlineUsers['level4'][$level1User->generatedId][$level2User->generatedId] = [];
                foreach ($level3Users as $level3User) {
                    $level4Users = sponsorTree::where('sponsor_id_number', $level3User->generatedId)->get();
                    $downlineUsers['level4'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId] = $level4Users;
                }
    
    
    
            }
        }
    

        


    }


    

   
    return view('tree.index', [
        'user' => $currentUser,
        'sponsor' => $sponsor,
        'downlineUsers' => $downlineUsers,
    ]);
}

    


}