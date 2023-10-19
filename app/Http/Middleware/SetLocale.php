<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class SetLocale
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
        if ($request->has('lang')) {
            // Set the chosen language in the session.
            Session::put('locale', $request->get('lang'));
            \App::setLocale($request->get('lang'));
        } elseif (Session::has('locale')) {
            // If no language is chosen in the current request, use the one from the session.
            \App::setLocale(Session::get('locale'));
        }

        return $next($request);
    }

}
