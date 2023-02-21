<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Authenticate extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $auth = $this->authenticate($request);

        if($auth) return $next($request);
        else {
            return Redirect::to('/')->with('loginForwardedTo', url($request->getRequestUri()));
        }
    }
}
