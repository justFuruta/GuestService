<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddDebugHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         $start = microtime(true);
         $response = $next($request);
         $duration = round((microtime(true) - $start) * 1000, 2);
 
         $memory = round(memory_get_peak_usage(true) / 1024, 2);
 
         $response->headers->set('X-Debug-Time', $duration . 'ms');
         $response->headers->set('X-Debug-Memory', $memory . 'Kb');
 
         return $response;
    }
}
