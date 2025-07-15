<?php
namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Courses;
use App\Models\Enrollments;
use App\Models\Lessons;
use App\Models\User;
use App\Models\Videos;

class DashboardController extends Controller
{
    public function index()
    {
        $enrollmentCount = Enrollments::count();
        $userCount       = User::count();
        $courseCount     = Courses::count();
        $lessonCount     = Lessons::count();
        $videoCount      = Videos::count();
        $categoryCount   = Categories::count();

        return view('dashboard', compact(
            'enrollmentCount',
            'userCount',
            'courseCount',
            'lessonCount',
            'videoCount',
            'categoryCount'
        ));
    }
}
