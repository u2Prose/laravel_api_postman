<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\UserController;
use Illuminate\Auth\Middleware\Authenticate;

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

/** ---------Register and Login ----------- */
Route::controller(RegisterController::class)->group(function()
{
    Route::post('register', 'register');
    Route::get('register', 'register');
    Route::get('logout', [RegisterController::class,'logout']); // Added route for logout
    Route::post('login', 'login');
    Route::get('login', 'login');
    Route::post('user', 'login')->name('index');
    Route::get('user', 'login')->name('index');
    Route::middleware('auth:sanctum')->post('/logout', [RegisterController::class, 'logout']);
});

/** -----------Users --------------------- */
Route::middleware('auth:sanctum')->group(function() {
    Route::get('/users',[RegisterController::class,'index'])->name('index');
});

Route::middleware('auth:sanctum')->controller(RegisterController::class)->group(function() {
    Route::get('/users','index')->name('index');

});
