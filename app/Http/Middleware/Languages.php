<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class Languages
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
        if(Session::has('currlocale') AND array_key_exists(Session::get('currlocale'),Config::get('app.locales'))) {
            App::setLocale(Session::get('currlocale'));
        }
        else{
            App::setLocale(Config::get('app.fallback_locale'));
        }
        return $next($request);
    }
}
