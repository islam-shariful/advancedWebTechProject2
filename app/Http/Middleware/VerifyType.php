<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class VerifyType
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
        $userType = $request->session()->get('type');
        if($userType == "admin" || $userType == "Admin"){
            return $next($request);
        }else {
            return redirect('/teacher/exam-grade');
        }
    }
}
