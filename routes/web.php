<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\EnrollmentsController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminAuthCheckMiddleware;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Auth;

// public routes
Route::view('/', 'welcome')->name('/');
Route::view('/contact', 'user.layouts.contact')->name('contact');
Route::view('/about', 'user.layouts.about')->name('about');
Route::view('/detail', 'user.layouts.courses_detail')->name('courses_detail');
Route::view('/lessons', 'user.layouts.course_lessons')->name('course.lessons');

Route::get('/course', [CoursesController::class, 'index'])->name('courses.index');
Route::get('/course/{id}', [CoursesController::class, 'course_detail'])->name('courses.show');

// no dashboard, using route to split admin and user
Route::get('/dashboard', function () {
})->middleware(['auth', 'verified', PreventBackHistory::class, AdminAuthCheckMiddleware::class])->name('dashboard');

Route::get('loginPage', [AdminAuthCheckMiddleware::class, AuthController::class, 'loginPage'])->name('auth#loginPage');
Route::get('registerPage', [AdminAuthCheckMiddleware::class, AuthController::class, 'registerPage'])->name('auth#registerPage');

// Routes that require authentication and role checking
Route::middleware([PreventBackHistory::class, 'auth', 'verified', RoleMiddleware::class])->group(function () {
    Route::prefix('user')->group(function () {
        Route::prefix('course')->group(function () {
            Route::get('lesson/{id}', [CoursesController::class, 'course_lessons'])->name('course.lessons');
        });
    });

    Route::prefix('admin')->group(function () {
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('admin.dashboard');

        Route::prefix('user')->group(function () {
            Route::get('list', [UserController::class, 'list'])->name('user.list');
            Route::post('create', [UserController::class, 'create'])->name('user.create');

            Route::post('edit', [UserController::class, 'edit'])->name('user.edit');
            Route::get('edit/{id}', [UserController::class, 'editPage'])->name('user.editPage');

            Route::get('delete/{id}', [UserController::class, 'delete'])->name('user.delete');
        });

        Route::prefix('category')->group(function () {
            Route::get('list', [CategoriesController::class, 'list'])->name('category.list');
            Route::post('create', [CategoriesController::class, 'create'])->name('category.create');

            Route::post('edit', [CategoriesController::class, 'edit'])->name('category.edit');
            Route::get('edit/{id}', [CategoriesController::class, 'editPage'])->name('category.editPage');

            Route::get('delete/{id}', [CategoriesController::class, 'delete'])->name('category.delete');
        });

        Route::prefix('course')->group(function () {
            Route::get('list', [CoursesController::class, 'list'])->name('course.list');
            Route::post('create', [CoursesController::class, 'create'])->name('course.create');

            Route::post('edit', [CoursesController::class, 'edit'])->name('course.edit');
            Route::get('edit/{id}', [CoursesController::class, 'editPage'])->name('course.editPage');

            Route::get('delete/{id}', [CoursesController::class, 'delete'])->name('course.delete');
        });

        Route::prefix('lesson')->group(function () {
            Route::post('listUpdate', [LessonsController::class, 'listUpdate'])->name('lesson.listUpdate');
            Route::get('list/{id}', [LessonsController::class, 'list'])->name('lesson.list');
            Route::post('create', [LessonsController::class, 'create'])->name('lesson.create');

            Route::post('edit', [LessonsController::class, 'edit'])->name('lesson.edit');
            Route::get('edit/{id}', [LessonsController::class, 'editPage'])->name('lesson.editPage');

            Route::delete('delete/{id}', [LessonsController::class, 'delete'])->name('lesson.delete');
        });

        Route::prefix('enrollment')->group(function () {
            Route::get('list', [EnrollmentsController::class, 'list'])->name('enrollment.list');
            Route::post('create', [EnrollmentsController::class, 'create'])->name('enrollment.create');

            Route::post('edit', [EnrollmentsController::class, 'edit'])->name('enrollment.edit');
            Route::get('edit/{id}', [EnrollmentsController::class, 'editPage'])->name('enrollment.editPage');
            Route::put('{id}/update', [EnrollmentsController::class, 'update'])->name('enrollment.update');

            Route::get('delete/{id}', [EnrollmentsController::class, 'delete'])->name('enrollment.delete');
        });
    });

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::fallback(function () {
    return redirect()->route('dashboard'); // Redirect to dashboard for undefined routes
});

//logout Route
use Illuminate\Support\Facades\Route;

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

require __DIR__ . '/auth.php';
