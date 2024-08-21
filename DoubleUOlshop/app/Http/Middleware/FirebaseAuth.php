<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;

class FirebaseAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna sudah terautentikasi
        if (!$request->session()->has('firebase_user')) {
            return redirect()->route('loginView');
        }

        // Set pengguna yang terautentikasi di request attributes
        $request->attributes->set('firebase_user', $request->session()->get('firebase_user'));

        return $next($request);
    }
}
