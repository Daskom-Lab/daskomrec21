<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ceknimController;

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

Route::get('/begin', function () {
    return view('master');
});

Route::get('/', function () {
    return view('main');
});

Route::get('/checkyournim', function () {
    return view('nimchecker');
});

Route::get('/checknim',[ceknimController::class,'index']);

Route::get('/checknim/{find}',[ceknimController::class,'found']);

Route::get('/testing',[CaasDaskomController::class,'index']);
