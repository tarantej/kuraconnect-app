<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;

class CheckForAllScopes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $scopes)
    {
        if (! $request->user() || ! $request->user()->token()) {
            throw new AuthenticationException;
        }

        foreach ($scopes as $scope) {
            if ($request->user()->tokenCan($scope)) {
                return $next($request);
            }
        }

        return response( array( "message" => "Not Authorized." ), 403 );

        // return $next($request);
    }
}
