<?php
namespace App\Http\Controllers;

class AuthenticatedUserController extends Controller
{
    public function index()
    {
        return view('userhome');
    }

    public function contact()
    {
        return view('user.layouts.contact');
    }
}
