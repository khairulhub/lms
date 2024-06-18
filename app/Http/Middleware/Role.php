<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        $userRole = $request->user()->role;
        if ($userRole === 'user' && $userRole !== 'user') {
            return redirect('/dashboard');
        }elseif($userRole === 'admin' && $userRole === 'user'){
            return redirect('/admin/dashboard');
        }
        elseif($userRole === 'instructor' && $userRole === 'user'){
            return redirect('/instructor/dashboard');
        }
        elseif($userRole === 'admin' && $userRole === 'instructor'){
            return redirect('/admin/dashboard');
        }
        elseif($userRole === 'instructor' && $userRole === 'admin'){
            return redirect('/instructor/dashboard');
        }
        return $next($request);
    }
}
