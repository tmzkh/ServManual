<?php

use Illuminate\Http\Request;

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

/**
 * Route requests to controllers
 */
Route::apiResource('/factorydevices', 'FactoryDeviceController');

Route::apiResource(
    '/factorydevices.maintenancetasks', 
    'MaintenanceTaskController')->only(['index', 'show']);

Route::apiResource('/maintenancetasks', 'MaintenanceTaskController');
