<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['prefix' => '/auth'], function () {
   
    Route::post('/', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'Login']);
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => '/user'], function () {   
        Route::get('/', [UserController::class, 'profile']);
    });
    Route::group(['prefix' => '/auth'], function () {   
        Route::get('/logout', [AuthController::class, 'logout']);
    });

});

