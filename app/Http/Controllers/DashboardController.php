<?php
namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Courses;
use App\Models\Enrollments;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $enrollmentCount = Enrollments::count();
        $userCount       = User::count();
        $courseCount     = Courses::count();
        $categoryCount   = Categories::count();
        $completedCount  = Enrollments::where('status', 'completed')->count();

        $userCreationData = User::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $enrollmentData = Enrollments::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        return view('dashboard', compact(
            'enrollmentCount',
            'userCount',
            'courseCount',
            'categoryCount',
            'completedCount',
            'userCreationData',
            'enrollmentData'
        ));
    }
}
