<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Import log

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            // Log peran pengguna untuk memeriksa apakah middleware berjalan
            Log::info("User ID: " . $user->id . " - Role: " . $user->role); 

            if (($role == 'admin' && $user->role != 1) || ($role == 'user' && $user->role != 0)) {
                Log::warning("Access denied for user ID: " . $user->id . " with role: " . $user->role);

                if ($user->role == 1) {
                    return redirect('/admin/dashboard');
                } else {
                    return redirect('/user/dashboard');
                }
            }
        } else {
            Log::warning("User is not authenticated.");
        }
        
        return $next($request);
    }
}
