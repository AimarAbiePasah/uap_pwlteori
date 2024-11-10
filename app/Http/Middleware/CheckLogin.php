<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah session 'user' ada
        if (!$request->session()->has('user')) {
            // Jika tidak ada, redirect ke halaman login
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu');
        }

        return $next($request);
    }
}
