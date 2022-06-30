<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dbtest\DbtestController;

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
 * 디비 테스트
 */
Route::get('/dbtest', [DbtestController::class, 'index']);
