<?php

namespace App\Http\Middleware;

use App\Models\EventPublisher;
use App\Models\Supplier;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckProfileInfo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authuser = auth()->user();
        $role = $authuser->roles->first();

        if (isset($role)) {
            if ($role->name == 'Publisher') {
                $event_publisher = EventPublisher::where('user_id', $authuser->id)->first();
                if ($event_publisher == null)
                    return redirect()->route('home');
            } elseif ($role->name == 'Supplier') {
                $supplier = Supplier::where('user_id', $authuser->id)->first();
                if ($supplier == null)
                    return redirect()->route('home');
            }
        }

        return $next($request);
    }
}
