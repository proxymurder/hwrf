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

$url = 'api.' . config('app.url');

JsonApiRoute::server('test')
    ->domain($url)
    ->prefix('tests')
    ->resources(function ($server) {
        Route::get('/foo', function (Request $request) {
            return response()->json([
                'connection' => 'success!!!',
                'another' => true,
                'user_id' => optional(auth('api')->user())->id,
            ]);
        });
    });

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });