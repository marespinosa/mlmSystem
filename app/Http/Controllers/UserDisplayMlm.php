<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sponsorTree;

class UserDisplayMlm extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function CurrentSponsorProfile()
    {
        $currentUser = auth()->user();
        $sponsor = null;

        if ($currentUser->generatedId) {
            $downlineUsers = $this->getDownlineUsers($currentUser->generatedId, 1);

            $levelBonuses = [0, 100, 50, 25, 15, 10, 10, 10, 10];
            $rebates = [0, .10, .05, .04, .03, .02, .01, .01, .01];

            $bonuses = [];

            for ($level = 1; $level <= 8; $level++) {
                $bonuses[$level] = $this->calculateBonus($downlineUsers, $level, $levelBonuses);
            }

            return view('profile.index', [
                'user' => $currentUser,
                'sponsor' => $sponsor,
                'downlineUsers' => [
                    'user' => $currentUser,
                    'downline' => $downlineUsers,
                    'bonuses' => $bonuses,
                ],
            ]);
        }
    }

    public function CurrentSponsor()
    {
        $currentUser = auth()->user();
        $sponsor = null;

        if ($currentUser->generatedId) {
            $downlineUsers = $this->getDownlineUsers($currentUser->generatedId, 1);

            $levelBonuses = [0, 100, 50, 25, 15, 10, 10, 10, 10];
            $rebates = [0, .10, .05, .04, .03, .02, .01, .01, .01];
            
            $bonuses = [];

            for ($level = 1; $level <= 8; $level++) {
                $bonuses[$level] = $this->calculateBonus($downlineUsers, $level, $levelBonuses);
            }

            return view('tree.index', [
                'user' => $currentUser,
                'sponsor' => $sponsor,
                'downlineUsers' => [
                    'user' => $currentUser,
                    'downline' => $downlineUsers,
                    'bonuses' => $bonuses,
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

        foreach ($downlineUsers as $user) {
            $result[$user->generatedId] = [
                'user' => $user,
                'levelUser' => $level,
                'downline' => $this->getDownlineUsers($user->generatedId, $level + 1),
            ];
        }

        return $result;
    }

    private function calculateBonus($downlineUsers, $levelUser, $levelBonuses)
    {
        $currentUser = auth()->user();
        $currentUserId = $currentUser->generatedId;
        
        $count = $this->countActiveDownlineUsers($downlineUsers, $currentUserId, $levelUser);

        // Get the bonus amount for the current level from the array
        $bonus = isset($levelBonuses[$levelUser]) ? $levelBonuses[$levelUser] : 0;


        $totalBonus = $bonus * $count;

        return $totalBonus;

    }

    private function countActiveDownlineUsers($downlineUsers, $currentUserGeneratedId, $levelUser)
    {
        $count = 0;

        foreach ($downlineUsers as $user) {
            if ($user['levelUser'] === $levelUser && 
                $user['user']->generatedId !== $currentUserGeneratedId &&
                $user['user']->acountStatus === 'active') { 
                $count++;
            }
            if (!empty($user['downline'])) {
                $count += $this->countActiveDownlineUsers($user['downline'], $currentUserGeneratedId, $levelUser);
            }
        }
    
        return $count;
    }



    private function monthlyIncome($downlineUsers, $currentUserGeneratedId, $levelUser)
    {
        $income = 650;
        


    }
}
