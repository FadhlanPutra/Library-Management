<?php


namespace App\Http\Middleware;

use Closure;
use App\Models\Log;
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
    public function handle(Request $request, Closure $next, $role): Response
    {
        if(Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }
        $nama = Auth::user()->name;
        Log::create([
            'level_log' => 'WARNING',
            'user' => Auth::user()->name,
            'message' => 'Mencoba Mengakses Halaman Lain',
            'judul_buku' => 'IP: '. $request->ip()."<br>". 'URL: '. $request->fullUrl(),
            'role' => Auth::user()->role,
        ]);
        abort(403, 'Beda kasta wahai '. $nama);
    }
}
