<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use App\User;

class VerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        // dd($user);
        if($user->email_verified_at != null) {
            return $next($request);
        }
        return response()->json([
            'message' => "Your account hasn't been verified",
        ]);
    }
}
