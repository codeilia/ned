<?php

namespace App\Http\Middleware;

use App\Nedsa\Helpers\CustomDateTime;
use Closure;

class ConvertToGreg
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->offsetSet('birthday', CustomDateTime::toGreg($request->birthday));
        return $next($request);
    }
}
