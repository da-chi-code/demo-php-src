<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LogMiddleware
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
        file_put_contents('/Applications/MAMP/htdocs/laravel/app/Http/Middleware/access.log', date('Y-m-d H:i:s') . "\n", FILE_APPEND);
        $response = $next($request);
        $response->setContent(mb_strtoupper($response->content()));
        return $response;
    }
}
