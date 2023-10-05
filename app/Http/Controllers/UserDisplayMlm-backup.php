<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sponsorTree;
use App\Models\checkoutModel;

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

        $bonus = isset($levelBonuses[$levelUser]) ? $levelBonuses[$levelUser] : 0;


        $totalBonus = $bonus * $count;

        return $totalBonus;

    }

    private function countActiveDownlineUsers($downlineUsers, $currentUserGeneratedId, $levelUser)
    {
        $count = 0;

        foreach ($downlineUsers as $user) {

            $currentMonthTotal = checkoutModel::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->sum('total_amount');


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


    private function rebatesCount($totalAmount, $rebates){
        rsort($rebates);

        $rebateAmounts = [];
        $totalWithRebates = [];
    
        foreach ($rebates as $rebate) {
            $rebateAmount = $totalAmount * $rebate;
            $totalAmount -= $rebateAmount;
            $rebateAmounts[] = $rebateAmount;
            $totalWithRebates[] = $totalAmount;
        }
    
        $results = [];
    
        for ($i = 0; $i < count($rebates); $i++) {
            $results[] = [
                'Rebate Percentage' => $rebates[$i] * 100 . "%",
                'Rebate Amount' => '$' . number_format($rebateAmounts[$i], 2),
                'Total Amount with Rebate' => '$' . number_format($totalWithRebates[$i], 2)
            ];
        }
    
        return $results;
    }

    }

    // Total amount of purchase
$totalAmount = 1000; // Replace this with your actual total amount

// Rebate percentages
$rebates = [0, 0.10, 0.05, 0.04, 0.03, 0.02, 0.01, 0.01, 0.01];

// Calculate rebates and get results
$results = calculateRebates($totalAmount, $rebates);

// Display the results
foreach ($results as $result) {
    echo "Rebate Percentage: " . $result['Rebate Percentage'] . "\n";
    echo "Rebate Amount: " . $result['Rebate Amount'] . "\n";
    echo "Total Amount with Rebate: " . $result['Total Amount with Rebate'] . "\n\n";
}





