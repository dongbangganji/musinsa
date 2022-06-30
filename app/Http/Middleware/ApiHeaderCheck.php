<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiHeaderCheck {

	public function handle(Request $request, Closure $next)
	{
		if (!$request->hasHeader('X-MUSINSA-CLIENT-ID')) {
            return response()->json('KEY IS NOT VALID!', 400);
		}
		$secret = config('api.X-MUSINSA-CLIENT')[$request->header('X-MUSINSA-CLIENT-ID')];
		if (!$secret) {
			return response()->json('ID IS NOT VALID!', 400);
		}else{
			if ($request->header('X-MUSINSA-CLIENT-KEY') != $secret) {
				return response()->json('KEY IS NOT VALID!', 400);
			}
		}
		return $next($request);
	}
}
