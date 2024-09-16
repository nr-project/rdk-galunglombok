<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use Carbon\Carbon;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /** Show the login page */
    public function login()
    {
        return view('auth.login');
    }

    /** Authenticate the user */
    public function authenticate(Request $request)
    {
        // Validate the request input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        
        try {
            // Attempt authentication with username and password
            if (Auth::attempt($request->only('username', 'password'))) {
                $user = Auth::user();
                $todayDate = Carbon::now()->toDayDateTimeString();

                // Store user information in session
                Session::put([
                    'name'         => $user->name,
                    'email'        => $user->email,
                    'user_id'      => $user->id, // Ensure this matches your model
                    'join_date'    => $user->join_date,
                    'last_login'   => $todayDate,
                    'phone_number' => $user->phone_number,
                    'location'     => $user->location,
                    'status'       => $user->status,
                    'role_name'    => $user->role_name,
                    'avatar'       => $user->avatar,
                    'position'     => $user->position,
                    'department'   => $user->department,
                ]);
                
                // Update last login
                $user->update(['last_login' => $todayDate]);

                Toastr::success('Login successful :)', 'Success');
                return redirect()->intended($this->redirectTo);
            } else {
                Toastr::error('Error: Wrong username or password :)', 'Error');
                return redirect('login');
            }
        } catch (\Exception $e) {
            \Log::error($e);
            Toastr::error('An error occurred during login :)', 'Error');
            return redirect()->back();
        }
    }

    /** Show logout page */
    public function logoutPage()
    {
        return view('auth.logout');
    }

    /** Logout and forget session */
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();

        Toastr::success('Logout successful :)', 'Success');
        return redirect('logout/page');
    }
}
