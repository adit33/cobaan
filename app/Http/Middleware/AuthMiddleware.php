<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Contracts\Auth\Guard;


class AuthMiddleware
{

    protected $auth;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

     public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect('login');
            }
        }

        return $next($request);
    }
}
