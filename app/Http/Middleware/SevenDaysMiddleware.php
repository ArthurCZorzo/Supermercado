<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SevenDaysMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $date = date_create();
        #dd($date, $request->user());
        if ($request->user()->created_at > date_sub($date, date_interval_create_from_date_string("7 days"))){
            session()->flash('mensagem', 'Você ainda não tem acesso a essa página');
            return redirect(route('login'));
        }
        return $next($request);
    }
}
