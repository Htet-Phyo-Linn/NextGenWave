<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $userRole = Auth::user()->role;
            // \Log::info('User role: ' . $userRole);
            // \Log::info('Admin route check: ' . ($request->is('admin/*') ? 'true' : 'false'));
            // \Log::info('Request path: ' . $request->path());  // Should be something like 'admin/dashboard'
            // dd($request->path());
            // dd($request->is('admin/*') && $userRole !== 'admin');
            // Admin-specific routes protection
            if ($request->is('admin*') && $userRole !== 'admin') {
                return redirect('/');
            }

            // Manager-specific routes protection
            elseif ($request->is('manager*') && $userRole !== 'manager') {
                return redirect('/');
            }

            // Instructor-specific routes protection
            elseif ($request->is('instructor*') && $userRole !== 'instructor') {
                return redirect('/');
            }

            // Student-specific routes protection
            elseif ($request->is('student*') && $userRole !== 'student') {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
