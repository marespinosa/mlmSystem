<?php

namespace App\Http\Controllers;

use App\Models\treeUs;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;

class MlmController extends Controller
{

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

        $accountLevel = auth()->user()->userlevel;

     
        $member = treeUs::find($id);

        if ($member) {
            $member->acountStatus = 'active';
            $member->save();

            return redirect()->route('superadmin.index')->with('success', 'Account activated successfully');
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






}

