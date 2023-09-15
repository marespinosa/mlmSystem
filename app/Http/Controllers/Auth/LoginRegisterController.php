<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\treeUs;
use Illuminate\Support\Str;
use App\Rules\UniqueUsername;


use Illuminate\Support\Facades\Mail;
use App\Mail\AdminRegistrationNotification;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard', 'admin.sidebar'
        ]);
    }

 
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'lastname' => 'required|string',
            'username' => ['required', 'string', 'max:255', new UniqueUsername],
            'password' => 'required|min:8|confirmed',
            'presentAddress' => 'required|string',
            'birthday' => 'required|date',
            'status' => 'required|string',
            'gender' => 'required|string',
            'nationality' => 'required|string',
            'sponsor_id_number' => 'required|string',
            'userlevel' => 'required|string', 
        ]);

        $sponsorUsageCount = User::where('sponsor_id_number', $request->sponsor_id_number)->count();

        if ($sponsorUsageCount >= 8 && $request->acountStatus !== 'deactivated') {
            return redirect()->back()->withErrors(['sponsor_id_number' => 'Sponsor ID number is no longer available for registration']);
        }


        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'presentAddress' => $request->presentAddress,
            'birthday' => $request->birthday,
            'status' => $request->status,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
            'sponsor_id_number' => $request->sponsor_id_number,
            'phoneNumber' => $request->phoneNumber,
            'acountStatus' => $request->acountStatus,
            'userlevel' => $request->userlevel,
        ]);

        $generatedIdUsageCount = User::where('generatedId', $user->generatedId)->count();

        if ($generatedIdUsageCount >= 8) {
            return redirect()->route('login')->withSuccess('Wait for your account to be activated');
        }

        
        User::where('generatedId', $user->generatedId)->increment('sponsor_usage_count');

        
       /**  $adminEmail = 'mariconespinosa.info@gmail.com';*/
       /** Mail::to($adminEmail)->send(new AdminRegistrationNotification($user));*/


        return redirect()->route('login')->withSuccess('Wait for your account to be activated');
    }


    public function login()
    {
        return view('auth.login');
    }

   
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        $user = User::where('username', $credentials['username'])->first();
    
        if ($user && $user->acountStatus === 'active') {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
    
                if ($user->userlevel === 'Member') {
                    if ($user->first_login) {
                        $user->first_login = true;
                        $user->save();
    
                        return redirect()->route('products')->withSuccess('Welcome, Member! This is your first time logging in!');
                    } else {
                        return redirect()->route('dashboard')->withSuccess('Welcome, Member! You have successfully logged in!');
                    }
                } elseif ($user->userlevel === 'Admin' || $user->userlevel === 'Stockies') {
                    return redirect()->route('dashboard')->withSuccess('Welcome, ' . $user->userlevel . '! You have successfully logged in!');
                } else {
                    return redirect()->route('dashboard')->withSuccess('Welcome! You have successfully logged in!');
                }
            } else {
                return back()->withErrors([
                    'username' => 'Your provided credentials do not match our records.',
                ])->onlyInput('username');
            }
        } else {
            return back()->withErrors([
                'username' => 'Your account is not active. Please contact support.',
            ])->onlyInput('username');
        }
    }
    

    
    public function dashboard()
    {
        if(Auth::check())
        {
            return view('auth.dashboard');
        }
        
        return redirect()->route('login')
            ->withErrors([
            'username' => 'Please login to access the dashboard.',
        ])->onlyInput('username');
    } 
    
    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }  

    






}