<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TechnicianAuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.technician.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('technician')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('technician.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid email or password.']);
    }

    public function showRegister()
    {
        return view('auth.technician.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:technicians,email',
            'password' => 'required|min:4|confirmed',
        ]);

        Technician::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('technician.login')->with('success', 'Registration successful! Please login.');
    }

    public function logout(Request $request)
    {
        Auth::guard('technician')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
