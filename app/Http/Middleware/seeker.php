<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class seeker
{
    public function handle($request, Closure $next)
    {
        if(Auth::check()&& Auth::user()->user_type == 'seeker'){

            return $next($request);


        }else{
            return redirect('/');
        }
    }
}
