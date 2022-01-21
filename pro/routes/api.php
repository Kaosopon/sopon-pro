<?php

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
  //  return $request->user();
//});

route::get('/Content' , [\App\Http\Controllers\Api\ContentApiController::class, 'index'] );
route::get('/Header' , [\App\Http\Controllers\Api\HeaderApiController::class, 'index'] );
route::get('/Menu' , [\App\Http\Controllers\Api\MenuApiController::class, 'index'] );
route::get('/Source' , [\App\Http\Controllers\Api\SourceApiController::class, 'index'] );
route::get('/Type' , [\App\Http\Controllers\Api\TypeApiController::class, 'index'] );
route::get('/User' , [\App\Http\Controllers\Api\UserApiController::class, 'index'] );
