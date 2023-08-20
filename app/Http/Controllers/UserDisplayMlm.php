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
    
        $downlineUsers = []; // Initialize an array to store downline users for each level
    
        if ($sponsorTreeEntry) {
            // Retrieve downline users for each level (assuming sponsor_id_number is a foreign key)
            $downlineUsers['level1'] = sponsorTree::where('sponsor_id_number', $sponsorTreeEntry->sponsor_id_number)->get();
    
            $downlineUsers['level2'] = [];
            foreach ($downlineUsers['level1'] as $downlineUser) {
                $downlineUsers['level2'][] = sponsorTree::where('sponsor_id_number', $downlineUser->generatedId)->get();
            }
        }
    
        return view('tree.index', [
            'user' => $currentUser,
            'sponsor' => $sponsor,
            'downlineUsers' => $downlineUsers,
        ]);
    }
    


}

