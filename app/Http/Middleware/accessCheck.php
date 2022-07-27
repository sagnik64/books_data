<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class accessCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $rules = array(
            "id"=>"numeric|exists:books"
        );

        $isValid = Validator::make($request->all(),$rules);
        if($isValid->fails()) {
            return response()->json($isValid->errors(),401);
        }

        if(!$request->key || ($request->key !== "1234")) {
            return response()->json([
                "success" => "false",
                "code" => 401,
                "message" => "Authentication credentials were missing or incorrect",
            ],401);
        }
        return $next($request);
    }
}
