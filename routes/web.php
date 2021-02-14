<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Login\DatacaasController;

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

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth:datacaas');

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest:datacaas');

Route::post('/loginCaas', [DatacaasController::class,'login'])->name('loginCaas');
Route::get('/logoutCaas', [DatacaasController::class,'logout'])->name('logoutCaas');
