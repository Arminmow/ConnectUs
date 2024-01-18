<?php

namespace App\Http\Middleware;


use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('auth.singin');
    }
}

//use closure;
//use Illuminate\Contracts\Auth\Guard;
//
//class Authenticate
//{
//
//    protected $auth;
//
//    public function _construct(Guard $auth)
//    {
//        $this->auth = $auth;
//    }
//
//    public function handle($request, Closure $next)
//    {
//        if ($this->auth->guest()){
//            if ($request->ajax()) {
//                return response('Unauthorized',401);
//            }else {
//                return redirect()->guest('auth.singin');
//            }
//        }
//        return $next($request);
//    }
//
//}
