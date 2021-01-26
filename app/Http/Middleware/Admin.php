<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return abort(404);
        } else if (Auth::user()->role < 1) {
            return abort(404);
        } else if ($request->ajax() && auth()->user()->role < 1) {
            return response()->json(['failed' => __('all.not_authorized')]);
        }
        return $next($request);
    }
}
