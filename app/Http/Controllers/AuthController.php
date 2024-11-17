<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController
{
     // Show the login form
     public function showLoginForm()
     {
         return view('auth.login');
     }

     // Handle the login process
     public function login(Request $request)
     {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Login Berhasil');
            } elseif ($user->role == 'user') {
                return redirect()->route('landing')->with('success', 'Login Berhasil');
            }
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
     }

     // Show the registration form
     public function showRegisterForm()
     {
         return view('auth.register');
     }

     // Handle the registration process
     public function register(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:users,email',
             'password' => 'required|string|min:6|confirmed',
         ]);

         // Create the user
         $user = User::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password),
             'role' => 'user', // Default role is 'user'
         ]);

         $user->save();

         return redirect()->route('login')->with('success', 'Register Berhasil, Silahkan Login');
     }

     // Handle logout
     public function logout(Request $request)
     {
         Auth::logout();

         $request->session()->invalidate();
         $request->session()->regenerateToken();

         return redirect('/')->with('success', 'Berhasil Logout');
     }
}
