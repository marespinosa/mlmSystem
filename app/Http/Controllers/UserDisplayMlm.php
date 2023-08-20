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
        $sponsor = sponsorTree::where('generatedId', $currentUser->generatedId)->first();
    }

    $sponsorTreeEntry = sponsorTree::where('generatedId', $currentUser->generatedId)->first();

    $downlineUsers = []; 

    if ($sponsorTreeEntry) {
        // Level 1 downline users
        $downlineUsers['level1'] = sponsorTree::where('sponsor_id_number', $sponsorTreeEntry->sponsor_id_number)->get();

        // Level 2 downline users
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
        }
    }

    return view('tree.index', [
        'user' => $currentUser,
        'sponsor' => $sponsor,
        'downlineUsers' => $downlineUsers,
    ]);
}

    


}

