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
        $downlineUsers = [];
    
   
        $downlineUsers['level1'] = sponsorTree::where('sponsor_id_number', $currentUser->generatedId)->get();
    
        if (!empty($downlineUsers['level1'])) {
            $downlineUsers['level2'] = [];
            $downlineUsers['level3'] = [];
            $downlineUsers['level4'] = [];
            $downlineUsers['level5'] = [];
            $downlineUsers['level6'] = [];
            $downlineUsers['level7'] = [];
            $downlineUsers['level8'] = [];
    
            foreach ($downlineUsers['level1'] as $level1User) {
                // Level 2 downline users
                $level2Users = sponsorTree::where('sponsor_id_number', $level1User->generatedId)->get();
                $downlineUsers['level2'][$level1User->generatedId] = $level2Users;
    
                if (!empty($level2Users)) {
                    foreach ($level2Users as $level2User) {
                        // Level 3 downline users
                        $level3Users = sponsorTree::where('sponsor_id_number', $level2User->generatedId)->get();
                        $downlineUsers['level3'][$level1User->generatedId][$level2User->generatedId] = $level3Users;
    
                        if (!empty($level3Users)) {
                            foreach ($level3Users as $level3User) {
                                // Level 4 downline users
                                $level4Users = sponsorTree::where('sponsor_id_number', $level3User->generatedId)->get();
                                $downlineUsers['level4'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId] = $level4Users;
    
                                if (!empty($level4Users)) {
                                    foreach ($level4Users as $level4User) {
                                        // Level 5 downline users
                                        $level5Users = sponsorTree::where('sponsor_id_number', $level4User->generatedId)->get();
                                        $downlineUsers['level5'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId][$level4User->generatedId] = $level5Users;
    
                                        if (!empty($level5Users)) {
                                            foreach ($level5Users as $level5User) {
                                                $level6Users = sponsorTree::where('sponsor_id_number', $level5User->generatedId)->get();
                                                $downlineUsers['level6'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId][$level4User->generatedId][$level5User->generatedId] = $level6Users;
    
                                                if (!empty($level6Users)) {
                                                    foreach ($level6Users as $level6User) {
                                                
                                                        $level7Users = sponsorTree::where('sponsor_id_number', $level6User->generatedId)->get();
                                                        $downlineUsers['level7'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId][$level4User->generatedId][$level5User->generatedId][$level6User->generatedId] = $level7Users;
    
                                                        if (!empty($level7Users)) {
                                                            foreach ($level7Users as $level7User) {

                                                                $level8Users = sponsorTree::where('sponsor_id_number', $level7User->generatedId)->get();
                                                                $downlineUsers['level8'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId][$level4User->generatedId][$level5User->generatedId][$level6User->generatedId][$level7User->generatedId] = $level8Users;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
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