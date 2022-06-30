<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Goods\GoodsController;
use App\Http\Controllers\Goods\v1\GoodsController as GoodsControllerV1 ;
use App\Http\Controllers\Goods\v2\GoodsController as GoodsControllerV2;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::group(['middleware' => ['api.header']], function () {
    Route::group(['prefix' => '/v1'], function () {
        Route::resource('/goods', GoodsControllerV1::class)->only(['store', 'show']);
    });
    Route::group(['prefix' => '/v2'], function () {
        Route::resource('/goods', GoodsControllerV2::class)->only(['store', 'show']);
    });

    Route::resource('/goods', GoodsController::class)->only(['store', 'show']);
//});
