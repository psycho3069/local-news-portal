<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Session::has('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Method 1: Hardcoded credentials (for quick demo)
        $adminUsername = 'admin';
        $adminPassword = 'admin123';

        if ($request->username === $adminUsername && $request->password === $adminPassword) {
            Session::put('admin_logged_in', true);
            Session::put('admin_user', $adminUsername);
            
            return redirect()->route('admin.dashboard')->with('success', 'Welcome to Admin Panel!');
        }

        // Method 2: Database authentication (check if username is email format)
        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            $user = \App\Models\User::where('email', $request->username)->first();
            
            if ($user && Hash::check($request->password, $user->password)) {
                Session::put('admin_logged_in', true);
                Session::put('admin_user', $user->name);
                Session::put('admin_email', $user->email);
                
                return redirect()->route('admin.dashboard')->with('success', 'Welcome to Admin Panel, ' . $user->name . '!');
            }
        }

        return back()->withErrors(['credentials' => 'Invalid username or password']);
    }

    public function logout()
    {
        Session::forget('admin_logged_in');
        Session::forget('admin_user');
        
        return redirect()->route('admin.login')->with('success', 'You have been logged out successfully');
    }
}
