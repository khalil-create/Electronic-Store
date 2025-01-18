<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Exception;
use Illuminate\Http\Request;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            if (Auth::user()) {
                $type = Auth::user()->type;
                if ($type != '1') {
                    return redirect()->back()->with(['error' => 'This Service is not Within Your Authority']);
                    // return response()->json(['status' => '0', 'msg' => 'This Service is not Within Your Authority']);
                }
                return $next($request);
            } else
                return redirect('home');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
