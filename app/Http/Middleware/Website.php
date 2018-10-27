<?php

namespace App\Http\Middleware;

use Closure;

class Website
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
        if (!session('blog_id') && $request->isMethod('base/delCollect')) {
            return redirect('/blog/manager/login');
        }
        return $next($request);
    }
}
