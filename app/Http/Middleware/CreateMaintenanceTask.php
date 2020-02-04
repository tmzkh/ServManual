<?php

namespace App\Http\Middleware;

use Closure;

class CreateMaintenanceTask
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $validator = Validator::make($request->all(), [
            'factoryDeviceId' => 'required|integer',
            'description' => 'required|string',
            'criticality' => 'required|integer|min:0|max:2'
        ]);

        if ($validator->fails()) {
            echo $validator;
            return;
        }
        
        return $next($request);
    }
}
