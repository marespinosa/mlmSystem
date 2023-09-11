<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Auth\Middleware\Authenticate as Middleware;


use App\Models\ProfileUpdates;


class UserController extends Controller
{



    protected $table = 'users'; 

    protected $id = 'id'; 

    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function UpdateProfilesPic(Request $request)
    {
     
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            $user = auth()->user();
            $user->profile_picture = 'images/' . $imageName;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile picture updated successfully');
    }

    public function index()
    {
        $ProfileUpdates = ProfileUpdates::all();
        return view('settings', compact('settings'));
    }

    public function update(Request $request, $id)
    {
        $ProfileUpdates = ProfileUpdates::find($id);
        $ProfileUpdates->name = $request->input('name');
        $ProfileUpdates->lastname = $request->input('lastname');
        $ProfileUpdates->email = $request->input('email');
        $ProfileUpdates->company = $request->input('company');
        $ProfileUpdates->zipcode = $request->input('zipcode');
        $ProfileUpdates->city = $request->input('city');
        $ProfileUpdates->save(); 
        
        return redirect()->back()->with('success', 'Data Updated Successfully');
    }


    public function showChangePasswordForm()
    {
        return view('settings.index');
    }


    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            return redirect()->route('showChangePasswordForm')->with('success', 'Password changed successfully.');
        } else {
            return redirect()->route('showChangePasswordForm')->with('error', 'The old password is incorrect.');
        }
    }

    



    
}
