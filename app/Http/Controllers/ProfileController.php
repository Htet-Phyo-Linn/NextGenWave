<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
         $user = Auth::user();

        $enrolledCourses = $user->enrollments()
        ->with('course')
        ->get()
        ->map(function ($enrollment) {
            return [
                'title' => $enrollment->course->title ?? 'Unknown Course',
                'status' => $enrollment->status,
            ];
        });

    return view('profile.show', compact('user', 'enrolledCourses'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);

        $user = Auth::user();

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('images/profile_photos', 'public');
            $user->profile_photo_path = $path;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return back()->with('status', 'profile-updated');
    }
}
