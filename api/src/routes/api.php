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

JsonApiRoute::server('test')
    ->domain($url)
    ->prefix('tests')
    ->resources(function ($server) {
        Route::get('/foo', function (Request $request) {
            return response()->json([
                'user_id' => optional(auth()->guard('api')->user())->id,
            ]);
        });
    });

Route::domain($url)
    ->group(
        function () {

            Route::name('logout')
                ->post('/logout', [
                    AuthController::class,
                    'logout'
                ]);
            Route::get('/location', function (Request $request) {
                $ip = config('location.testing.enabled') ? config('location.testing.ip') : $request->ip();
                $http = Http::get("https://ipapi.co/{$ip}/json/");

                return $http->json();
            });
        }
    );

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });