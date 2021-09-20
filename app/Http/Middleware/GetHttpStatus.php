<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GetHttpStatus
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
        return $next($request);
    }

    public function getHTTPResponseStatusCode($url) {
        $status = null;

        $headers = @get_headers($url, 1);
        if (is_array($headers)) {
            $status = substr($headers[0], 9);
        }
    
        return $status;
    }
}
