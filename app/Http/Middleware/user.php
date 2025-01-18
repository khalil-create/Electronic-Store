<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class user
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
            if(Auth::user()){
                $type = Auth::user()->employee->type;
                if($type != 2)
                {
                    return redirect()->back()->with(['error' => 'This Service is not Within Your Authority']);
                    // return response()->json(['status' => '0', 'msg' => 'This Service is not Within Your Authority']);
                }
                return $next($request);
            }
            else
                return redirect('login');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
