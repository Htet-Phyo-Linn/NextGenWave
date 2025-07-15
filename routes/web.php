<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthenticatedUserController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\EnrollmentsController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [AuthenticatedUserController::class, 'index'])->name('home');
Route::view('/contact', 'user.layouts.contact')->name('contact');
Route::view('/about', 'user.layouts.about')->name('about');

// Public Course Routes
Route::prefix('course')->name('courses.')->group(function () {
    Route::get('/', [CoursesController::class, 'index'])->name('index');
    Route::get('/{id}', [CoursesController::class, 'course_detail'])->name('show');

    // 👇 New route for course lessons
    Route::get('/{id}/lessons', [CoursesController::class, 'lessons'])->name('lessons');
});



/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('loginPage', [AuthController::class, 'loginPage'])->name('auth.loginPage');
Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth.registerPage');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

/*
|--------------------------------------------------------------------------
| Dashboard Route (Redirects based on role)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('home');
})->middleware(['auth', 'verified', PreventBackHistory::class])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified', PreventBackHistory::class])->group(function () {
    // Profile Routes
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('show');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
    });

    // User Course Routes
    Route::middleware([RoleMiddleware::class])->prefix('user')->name('user.')->group(function () {
        Route::prefix('course')->name('course.')->group(function () {
            Route::get('lesson/{id}', [CoursesController::class, 'course_lessons'])->name('lessons');
        });
    });
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified', PreventBackHistory::class, RoleMiddleware::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Admin Dashboard
        Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

        // User Management
        Route::prefix('user')->name('user.')->group(function () {
            Route::get('list', [UserController::class, 'list'])->name('list');
            Route::post('create', [UserController::class, 'create'])->name('create');
            Route::get('edit/{id}', [UserController::class, 'editPage'])->name('editPage');
            Route::post('edit', [UserController::class, 'edit'])->name('edit');
            Route::delete('delete/{id}', [UserController::class, 'delete'])->name('delete');
        });

        // Category Management
        Route::prefix('category')->name('category.')->group(function () {
            Route::get('list', [CategoriesController::class, 'list'])->name('list');
            Route::post('create', [CategoriesController::class, 'create'])->name('create');
            Route::get('edit/{id}', [CategoriesController::class, 'editPage'])->name('editPage');
            Route::post('edit', [CategoriesController::class, 'edit'])->name('edit');
            Route::delete('delete/{id}', [CategoriesController::class, 'delete'])->name('delete');
        });

        // Course Management
        Route::prefix('course')->name('course.')->group(function () {
            Route::get('list', [CoursesController::class, 'list'])->name('list');
            Route::post('create', [CoursesController::class, 'create'])->name('create');
            Route::get('edit/{id}', [CoursesController::class, 'editPage'])->name('editPage');
            Route::post('edit', [CoursesController::class, 'edit'])->name('edit');
            Route::delete('delete/{id}', [CoursesController::class, 'delete'])->name('delete');
        });

        // Lesson Management
        Route::prefix('lesson')->name('lesson.')->group(function () {
            Route::get('list/{id}', [LessonsController::class, 'list'])->name('list');
            Route::post('listUpdate', [LessonsController::class, 'listUpdate'])->name('listUpdate');
            Route::post('create', [LessonsController::class, 'create'])->name('create');
            Route::get('edit/{id}', [LessonsController::class, 'editPage'])->name('editPage');
            Route::post('edit', [LessonsController::class, 'edit'])->name('edit');
            Route::delete('delete/{id}', [LessonsController::class, 'delete'])->name('delete');
        });

        // Enrollment Management
        Route::prefix('enrollment')->name('enrollment.')->group(function () {
            Route::get('list', [EnrollmentsController::class, 'list'])->name('list');
            Route::post('create', [EnrollmentsController::class, 'create'])->name('create');
            Route::get('edit/{id}', [EnrollmentsController::class, 'editPage'])->name('editPage');
            Route::post('edit', [EnrollmentsController::class, 'edit'])->name('edit');
            Route::put('{id}/update', [EnrollmentsController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [EnrollmentsController::class, 'delete'])->name('delete');
        });
    });

/*
|--------------------------------------------------------------------------
| Fallback Route
|--------------------------------------------------------------------------
*/
Route::fallback(function () {
    return redirect()->route('dashboard');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
