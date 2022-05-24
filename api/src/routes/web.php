<?php

use App\Http\Controllers\OAuth\AuthController;
use App\Http\Controllers\OAuth\AuthorizationController;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Passport;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$url = 'oauth.' . config('app.url');

Route::domain($url)
    ->group(
        function () {
            Route::view('login', 'login');
            Route::name('login')
                ->post('login', [
                    AuthController::class,
                    'login',
                ]);

            Route::middleware('auth')
                ->name('passport.authorizations.authorize')
                ->get('/authorize', [
                    AuthorizationController::class,
                    'authorize'
                ]);
        }
    );