<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Stevebauman\Location\Facades\Location;
use App\Http\Controllers\OAuth\AuthController;
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

Route::domain($url)
    ->group(
        function () {
            Route::get('/location', function (Request $request) {
                $ip = config('location.testing.enabled') ? config('location.testing.ip') : $request->ip();
                $http = Http::get("https://ipapi.co/{$ip}/json/");

                return $http->json();
            });

            Route::get('/test', function (Request $request) {
                return response()->json([
                    'status' => 200,
                ]);
            });
        }
    );