<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminAuth
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
        $email = $request->cookie('adminIdentifier');
        $rememberToken = $request->cookie('adminRememberToken');

        if($email && $rememberToken){
            $admin = Admin::where('email', $email)->where('rememberToken', $rememberToken)->first();

            if($admin) return $next($request);
        }

        return Redirect::to('admin');
    }
}
