<?php

use App\Http\Controllers\Api\AuthController;
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
Route::group(['middleware' => ['cors']], function () {
Route::post('test',[AuthController::class,'test']);
Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

    Route::group(['middleware' => ['auth:api','cors']], function () {
        Route::post('me', [AuthController::class, 'me']);
        Route::post('logout', [AuthController::class, 'logout']);
    });
});


//testing
//Route::post('me', function (Request $request){
//    dd($request->all());
//});
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
