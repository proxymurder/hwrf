<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use LaravelJsonApi\Laravel\Facades\JsonApiRoute;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$url = config('app.url');

JsonApiRoute::server('test')
    ->domain('api.' . $url)
    ->resources(function ($server) {
        Route::get('/test', function (Request $request) {
            return response()->json([
                'connection' => 'success!!!'
            ]);
        });
    });

Route::domain('api.' . $url)->group(function () {
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });