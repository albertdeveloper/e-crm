<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class HandleInertiaGates
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
        Inertia::share(array_filter([
            'allowed_gates' => function () use ($request) {
                $allowed_gates = sizeof($request->user()->roles->toArray()[0]['permissions']) > 0 ? $request->user()->roles[0]->permissions->pluck('title') : null;
                return $allowed_gates ? $allowed_gates : array(0);
            },
            'toast' => function () {
               return Session::get('toast');
            },
            'popstate' => function () {
                return false;
            }
        ]));

        return $next($request);
    }
}
