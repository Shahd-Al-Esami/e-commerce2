<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $routeName = $request->route()->getName();

        // Fetch the order from the route parameter
        $order = $request->route('order');

        // Check if the route matches the specified names
        if (in_array($routeName, [ 'orders.update', 'orders.pay'])) {
            // Check if the user is authenticated and is the owner of the order
            if (auth()->check() && auth()->user()->id === $order->user_id) {
                return $next($request);
            } else {
                return response()->json(['error' => 'You must be the order owner to do this.'], Response::HTTP_FORBIDDEN);
            }
        } elseif (in_array($routeName, ['orders.show', 'orders.destroy'])) {
            if (auth()->check() && (auth()->user()->role === 'admin' || auth()->user()->id === $order->user_id)) {
                return $next($request);
            } else {
                return response()->json(['error' => 'You must be admin or the order owner to do this.'], );
            }
        }

        return response()->json(['error' => 'Unauthorized action.'], Response::HTTP_UNAUTHORIZED);
    }
}
