<?php
namespace App\Http\Controllers;

use App\Models\Courses;

class AuthenticatedUserController extends Controller
{
    public function index()
    {
        $courses = Courses::take(4)->get();
        return view('user.master', compact('courses'));
    }

    public function contact()
    {
        return view('user.layouts.contact');
    }
}
