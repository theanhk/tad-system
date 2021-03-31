<?php

namespace Tadcms\System\Http\Middleware;

use Closure;

class Admin
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
        if (!\Auth::check()) {
            return redirect()->route('admin.login');
        }
        
        /*if (\Auth::user()->is_admin == 0) {
            return redirect()->to('/');
        }*/
        
        do_action('admin.middleware');
        
        return $next($request);
    }
}
