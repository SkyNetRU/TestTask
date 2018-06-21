<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class LogMiddleware {

	/**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
	    $url = $request->fullUrl();
	    $method = $request->method();
	    $input = json_encode($request->all());
	    $ip = \Request::ip();
	    $agent = $request->header('User-Agent');

	    Log::info('Request from IP: '.$ip.' agent: '.$agent.' url: '.$url.' method: '.$method.' input: '.$input.' ');

	    return $next($request);
    }
}
