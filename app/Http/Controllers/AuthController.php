<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Redirect ke dashboard umum
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // Dashboard methods
    public function userDashboard()
    {
        return view('dashboard.user');
    }

    public function adminDashboard()
    {
        return view('dashboard.admin');
    }

    public function guruDashboard()
    {
        return view('dashboard.guru');
    }

    public function siswaDashboard()
    {
        return view('dashboard.siswa');
    }
}