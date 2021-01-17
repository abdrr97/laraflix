<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;

class CheckBanned
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
        if (auth()->check() && auth()->user()->banned_until && now()->lessThan(auth()->user()->banned_until)) {
            $banned_days = now()->diffInDays(auth()->user()->banned_until);
            auth()->logout();
            $plural = Str::plural('day', $banned_days);

            $message = 'Your account has been suspended for <b>' .
                $banned_days . ' ' . $plural . '</b> . Please contact administrator.';

            return redirect()->route('login')->withMessage($message);
        }

        return $next($request);
    }
}
