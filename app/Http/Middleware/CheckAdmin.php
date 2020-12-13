<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        
        if($user->isAdmin()) {
            return $next($request);
        }
        return response()->json([
            'message' => "You don't have authorize to access this",
        ]);
    }
}
