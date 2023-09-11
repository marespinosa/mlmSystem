<?php

namespace App\Http\Controllers;

use App\Models\treeUs;
use Illuminate\Http\Request;

use Illuminate\Auth\Middleware\Authenticate as Middleware;


use App\Http\Controllers\Controller;

class MlmController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile()
    {
        $currentUser = auth()->user();

        $sponsor = null;
        if ($currentUser->generatedId) {
            $sponsor = treeUs::where('id', $currentUser->generatedId)->first();
        }

        return view('profile.index', [
            'user' => $currentUser,
        ]);
    }


    public function activateAccount()
    {
        $members = treeUs::all(); 
        return view('superadmin.index', compact('members'));
    }



    public function update($id)
    {
        $member = treeUs::find($id);

        if ($member) {
            if ($member->acountStatus === 'active') {
                $member->acountStatus = 'deactivate';
                $message = 'Account deactivated successfully';
            } else {
                $member->acountStatus = 'active';
                $message = 'Account activated successfully';
            }

            $member->save();

            return redirect()->route('superadmin.index')->with('success', $message);
        } else {
            return redirect()->route('superadmin.index')->with('error', 'Member not found');
        }
    }


    public function SearchMember(Request $request)
    {
    
        $searchQuery = $request->input('search');

    
        $query = treeUs::query();
        
        if ($searchQuery) {
        
            $query->where('name', 'LIKE', '%' . $searchQuery . '%')
                ->orWhere('lastname', 'LIKE', '%' . $searchQuery . '%')
                ->orWhere('email', 'LIKE', '%' . $searchQuery . '%')
                ->orWhere('acountStatus', 'LIKE', '%' . $searchQuery . '%');
        }

    
        $members = $query->paginate(20);

        return view('superadmin.index', compact('members', 'searchQuery'));
    }


    public function viewform($id)
    {
        $member = treeUs::find($id);
        return view('superadmin.edit-data');
        
    }

    public function sponsorDetails($sponsor_id_number)
    {
        $HeadMember = treeUs::where('sponsor_id_number', $sponsor_id_number)->first();

        if (!$member) {
            return redirect()->route('superadmin.index')->with('error', 'Member not found.');
        }
    
        
        return view('superadmin.index', compact('HeadMember'));
    }
    






}

