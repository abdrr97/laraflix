<?php

namespace App\Http\Middleware;

use App\Movie;
use App\Serie;
use Closure;

class CheckSubscription
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
        $id = $request->route()->parameter('id');
        $movie = Movie::find($id);
        $serie = Serie::find($id);
        $film = !empty($movie) ? $movie : $serie;
        if ($film->is_premium && !auth()->user()->subscribed('default')) {
            return redirect('payment');
        }
        return $next($request);
    }
}
