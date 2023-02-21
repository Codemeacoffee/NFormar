<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    // protected $platformUrl = 'http://e-commerce.gesforcan.com/api/';
    protected $platformUrl = 'https://e-commerce.gesforcan.com/api/';

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function authenticate(Request $request){
        $email = $request->cookie('identifier');
        $rememberToken = $request->cookie('rememberToken');

        if($email && $rememberToken){
            $user = User::where('email', $email)->where('rememberToken', $rememberToken)->where('confirmed', true)->first();
            $request['user'] = $user;

            if($user) return true;
        }
        return false;
    }
}
