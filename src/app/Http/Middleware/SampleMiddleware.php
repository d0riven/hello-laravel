<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SampleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        ini_set('error_log', 'php://stderr');
        error_log('before handle');
        $response = $next($request);
        error_log('after handle');
        return $response;
        // 本の嘘の例（returnのあとに書いて実行されるわけ無いだろ
//        return $next($request);
//        error_log('after handle'); // これは実行されない
    }
}
