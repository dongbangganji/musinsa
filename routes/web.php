<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Goods\GoodsController;

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

Route::get('/', function () {
    return view('welcome');
});

/**
 * TODO 등록 페이지는 테스트 편의를 위해서 만들엇습니다.
 */
Route::resource('/goods', GoodsController::class)->only(['create','index']);
