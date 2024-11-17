<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function index()
    {
        $courses = Course::all(); // Ambil semua data course
        return view('landing', compact('courses'));
    }

    public function help()
    {
        return view('help');
    }
    public function profile()
    {
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'string',],
            'profile_picture' => ['image', 'max:4048'],
        ]);

        $data = $request->only([
            'name',
            'phone_number',
        ]);

        if ($request->hasFile('profile_picture')) {

            $data['profile_picture'] = $request->file('profile_picture')->store('images', 'public');
        }

        $data['password'] = bcrypt($request->password);

        $user = User::find(Auth::id());
        $user->update([
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'password' => $data['password'],
            'profile_picture' => $data['profile_picture'] ?? "",
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
