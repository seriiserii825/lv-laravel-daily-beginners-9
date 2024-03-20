<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Front\HomeFrontController;
use App\Http\Controllers\PostFrontController;
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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) { */
/*     return $request->user(); */
/* }); */

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('home', [HomeFrontController::class, 'index']);
Route::get('post', [PostFrontController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    /* Route::get('user', [AuthController::class, 'user']); */
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('user', [AuthController::class, 'user']);
});
/* Route::apiResources([ */
/*     'home' => HomeControllerController::class, */
/*     'category' => CategoryController::class, */
/* ]); */
