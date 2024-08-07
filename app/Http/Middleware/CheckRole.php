<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


    // public function handle($request, Closure $next, $role)
    // {
    //     if (!$request->user() || !$request->user()->hasRole($role)) {
    //        return response()->json(['error' => 'You do not have permission to perform this action.'], 403);
    //     }

    //     return $next($request);
    // }

 
        public function handle($request, Closure $next, ...$roles)
        {
           

            $user=  auth('user')->user();
            if (!$user) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        
            $hasRole = false;
            foreach ($roles as $role) {
                if ($user->hasRole($role) ) {
                    $hasRole = true;
                    break; 
                }
            }
            if (!$hasRole) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }


            if ($request->isMethod('post') && !$user->authorized) {
                return response()->json(['error' => 'Unauthorized!!!!'], 403);
            }


            return $next($request);
        }
    

}
