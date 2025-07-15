<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function adminProfile()
    {
        return view('admin.profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    public function show()
    {
        $user = Auth::user();

        // Example enrolled courses array — replace with actual user courses from DB if you have
        $enrolledCourses = [
            ['title' => 'Full-Stack Web Development', 'status' => 'In Progress'],
            ['title' => 'Data Science Bootcamp', 'status' => 'Not Started'],
            ['title' => 'JavaScript Essentials', 'status' => 'In Progress'],
        ];

        return view('profile.show', compact('user', 'enrolledCourses'));
    }

    public function update(Request $request)
    {
        try {
            $user = Auth::user();
    
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
            ];
    
            // Add password validation rules only if a new password is provided
            if ($request->filled('password')) {
                $rules['current_password'] = ['required', 'current_password'];
                $rules['password'] = ['required', Password::defaults(), 'confirmed'];
            }
    
            $request->validate($rules);
    
            if ($request->hasFile('profile_photo')) {
                $path = $request->file('profile_photo')->store('images/profile_photos', 'public');
                $user->profile_photo_path = $path;
            }
    
            $user->name = $request->name;
            $user->email = $request->email;
    
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
    
            $user->save();
    
            return back()->with('status', 'Profile updated successfully.');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return back()->with('error', implode('<br>', $errors));
        }
    }
}
