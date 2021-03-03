<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Login\DatacaasController;
use App\Http\Controllers\Auth\Login\AdminController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\PlotController;
use App\Models\Datacaas;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Status;
use App\Models\Tahap;
use App\Models\Statustahap;
use App\Models\Namatahap;
use App\Models\Ceklulus;
use App\Models\Shift;
use App\Models\Plot;
use App\Models\Plotactive;
use App\Models\Messageceklulus;
use Illuminate\Support\Facades\Auth;

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

//Guest Routes

Route::get('/', function () {
    return view('main');
})->name('main')->middleware('guest:admins','guest:datacaas');

//Caas auth

#Login Page
Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest:admins','guest:datacaas');
Route::post('/loginCaas', [DatacaasController::class,'login'])->name('loginCaas');

#Home Caas Account
Route::get('/home', [DatacaasController::class,'home'])->name('home')->middleware('auth:datacaas');

#Change Password
Route::post('/PassCaas', [DatacaasController::class,'changepass'])->name('changepass')->middleware('auth:datacaas');

#Logout Caas
Route::get('/logoutCaas', [DatacaasController::class,'logout'])->name('logoutCaas');

#Cek kelulusan
Route::get('/ceklulus', [StatusController::class,'check'])->name('ceklulus')->middleware('auth:datacaas');

#plots
Route::get('/listplot', [PlotController::class,'listplot'])->name('listplot')->middleware('auth:datacaas');
Route::get('/takeplot/{id}', [PlotController::class,'takeplot'])->name('takeplot')->middleware('auth:datacaas');
Route::post('/takeplot/createplot/{id}', [PlotController::class,'fixtakeplot'])->name('fixtakeplot')->middleware('auth:datacaas');




//Admin Auth

#Login Page for Admin
Route::get('/loginAdmin', function () {
    return view('loginAdmin');
})->name('loginAdmin')->middleware('guest:admins','guest:datacaas');

#home page Admin
Route::get('/adminHome', [AdminController::class,'home'])->name('adminHome')->middleware('auth:admins');
Route::post('/PassAdmin', [AdminController::class,'changepass'])->name('changepass')->middleware('auth:admins');
Route::post('/loginAdmin', [AdminController::class,'login'])->name('loginAdmin');
Route::get('/logoutAdmin', [AdminController::class,'logout'])->name('logoutAdmin');

#caas account controller
Route::get('/CaasAccount', [DatacaasController::class,'caasAccount'])->name('CaasAccount')->middleware('auth:admins');
Route::post('/AddCaas', [DatacaasController::class,'add'])->name('Addcaas')->middleware('auth:admins');
Route::get('/EditCaasAccount/{datacaas_id}', [DatacaasController::class,'edit'])->name('EditCaasAccount')->middleware('auth:admins');
Route::post('/UpdateCaasAccount/{datacaas_id}', [DatacaasController::class,'update'])->name('Update')->middleware('auth:admins');
Route::get('/CariNIM', [DatacaasController::class,'cari'])->name('cari')->middleware('auth:admins');
Route::get('/delcaasconfirm/{datacaas_id}', [DatacaasController::class,'delconfirm'])->name('delconfirm')->middleware('auth:admins');
Route::get('/delcaas/{datacaas_id}', [DatacaasController::class,'del'])->name('del')->middleware('auth:admins');

#Set Data Plot and Kelulusan
Route::post('/SetData', [StatusController::class,'SetData'])->name('setdata')->middleware('auth:admins');

#Shift Section
Route::get('/ListShift', [ShiftController::class,'ListShift'])->name('shift')->middleware('auth:admins');
Route::post('/addShift', [ShiftController::class,'addShift'])->name('addShift')->middleware('auth:admins');
Route::get('/EditShift/{id}', [ShiftController::class,'EditShift'])->name('EditShift')->middleware('auth:admins');
Route::post('/UpdateShift/{id}', [ShiftController::class,'UpdateShift'])->name('UpdateShift')->middleware('auth:admins');
Route::get('/delShiftconfirm/{id}', [ShiftController::class,'delShiftConfirm'])->name('DelShiftconfrim')->middleware('auth:admins');
Route::post('/delShift/{id}', [ShiftController::class,'delShift'])->name('delShift')->middleware('auth:admins');

#view plots result
Route::get('/ResultPlot', [PlotController::class,'ResultPlot'])->name('resultplot')->middleware('auth:admins');