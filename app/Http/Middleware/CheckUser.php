<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Order;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

          // Get the route name
        $routeName = $request->route()->getName();

        // Fetch the order from the route parameter
       $order=$request->route('order');

        // Check if the route matches the specified names
        if (in_array($routeName, ['orders.edit', 'orders.update', 'orders.pay'])) {
            // Check if the user is authenticated and is the owner of the order
            if (auth()->check() && auth()->user()->id === $order->user_id) {
                return $next($request);
            } else {
                return redirect()->back()->with('alert', 'You must be the order owner to do this.');
            }
        } elseif(in_array($routeName, ['orders.show', 'orders.destroy'])){



          if(auth()->check() && ( auth()->user()->role=='admin' || auth()->user()->id === $order->user_id)) {
              return $next($request);
          }else

        return redirect()->back()->with('alert', 'You must be admin or the order owner to do this.');
    }
    return redirect()->back()->with('alert', 'You must be admin or the order owner to do this.');

}
}



