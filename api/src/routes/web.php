<?php

use App\Http\Controllers\OAuth\AuthController;
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

$url = config('app.url');

Route::domain('oauth.' . $url)->group(function () {
    Route::view('login', 'login');
    Route::post('login', [
        AuthController::class,
        'login',
    ])->name('login');
});