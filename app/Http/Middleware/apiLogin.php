<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class apiLogin
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
        $secret= DB::table('oauth_clients')
        ->where('id',1)
        ->pluck('secret')
        ->first();

        $request->merge([
            'grant_type'=>'password',
            'client_id'=>1,
            'client_secret'=>$secret,
        ]);
        return $next($request);
    }
}
