<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Auth;

class IsActiveToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        if(Auth::user()) {
            $tk = Auth::user()->token();
            if($tk) {
                if (Carbon::parse($tk->expires_at) < Carbon::now()) {
                    dd("Token Expired Check middleware isActiveToken");
                }
            }
        }
        return $response;
    }
}
