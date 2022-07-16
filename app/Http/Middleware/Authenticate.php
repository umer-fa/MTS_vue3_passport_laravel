<?php

namespace App\Http\Middleware;

use http\Cookie;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
//        if($request->hasCookie('_token')){
//            $t = \Illuminate\Support\Facades\Cookie::get('_token');
////            $token = $request->cookie('_token');
//            $request->headers->add(['Authorization' => 'Bearer ' . $t]);
//        }
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
