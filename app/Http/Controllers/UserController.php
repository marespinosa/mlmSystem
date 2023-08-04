<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\profileUpdates;


class UserController extends Controller
{

    protected $table = 'users'; 

    protected $id = 'id'; 

    
    public function update(Request $request, $id)
    {


        $UpdatedData = $request->validate([
            'name' => 'string',
            'lastname' => 'string',
            'username' => 'string',
            'email' => 'string',
            'presentAddress' => 'string',
            'birthday' => 'date',
            'status' => 'string',
            'gender' => 'string',
            'nationality' => 'string',
            'phoneNumber'  => 'string',
        ]);

        $member = profileUpdates::find($id);
        $member->update($UpdatedData);

        return view('settings.index', compact('member'));
        
    }

    public function UpdateProfilesPic(Request $request)
    {
     
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('profile_images'), $imageName);

            $user = auth()->user();
            $user->profile_picture = 'profile_images/' . $imageName;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile picture updated successfully');
    }

    
}
