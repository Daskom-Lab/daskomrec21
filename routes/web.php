<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Login\DatacaasController;
use App\Http\Controllers\Auth\Login\AdminController;
use App\Http\Controllers\Auth\Login\LogistikController;
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
})->name('main')->middleware('guest:admin','guest:datacaas','guest:logistik');


Route::fallback(function () {

    return redirect('/');

});

//Caas auth

#Login Page
Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest:admin','guest:datacaas','guest:logistik');

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
Route::get('/finalPlot', [PlotController::class,'finalPlot'])->name('finalPlot')->middleware('auth:datacaas');
Route::get('/takeplot/{id}', [PlotController::class,'takeplot'])->name('takeplot')->middleware('auth:datacaas');
Route::post('/takeplot/createplot/{id}', [PlotController::class,'fixtakeplot'])->name('fixtakeplot')->middleware('auth:datacaas');




//Admin Auth

#Login Page for Admin
Route::get('/loginAdmin', function () {
    return view('loginAdmin');
})->name('loginAdmin')->middleware('guest:admin','guest:datacaas','guest:logistik');

#home page Admin
Route::get('/adminHome', [AdminController::class,'home'])->name('adminHome')->middleware('auth:admin');
Route::post('/PassAdmin', [AdminController::class,'changepass'])->name('changepass')->middleware('auth:admin');
Route::post('/loginAdmin', [AdminController::class,'login'])->name('loginAdmin');
Route::get('/logoutAdmin', [AdminController::class,'logout'])->name('logoutAdmin');

#caas account controller
Route::get('/CaasAccount', [DatacaasController::class,'caasAccount'])->name('CaasAccount')->middleware('auth:admin');
Route::post('/AddCaas', [DatacaasController::class,'add'])->name('Addcaas')->middleware('auth:admin');
Route::get('/EditCaasAccount/{datacaas_id}', [DatacaasController::class,'edit'])->name('EditCaasAccount')->middleware('auth:admin');
Route::post('/UpdateCaasAccount/{datacaas_id}', [DatacaasController::class,'update'])->name('Update')->middleware('auth:admin');
Route::get('/CariNIM', [DatacaasController::class,'cari'])->name('cari')->middleware('auth:admin');
Route::get('/delcaasconfirm/{datacaas_id}', [DatacaasController::class,'delconfirm'])->name('delconfirm')->middleware('auth:admin');
Route::get('/delcaas/{datacaas_id}', [DatacaasController::class,'del'])->name('del')->middleware('auth:admin');

#Set Data Plot and Kelulusan
Route::post('/SetData', [StatusController::class,'SetData'])->name('setdata')->middleware('auth:admin');
Route::post('/Setfirstmeet', [StatusController::class,'Setfirstmeet'])->name('Setfirstmeet')->middleware('auth:admin');

#Shift Section
Route::get('/ListShift', [ShiftController::class,'ListShift'])->name('shift')->middleware('auth:admin');
Route::post('/addShift', [ShiftController::class,'addShift'])->name('addShift')->middleware('auth:admin');
Route::get('/EditShift/{id}', [ShiftController::class,'EditShift'])->name('EditShift')->middleware('auth:admin');
Route::post('/UpdateShift/{id}', [ShiftController::class,'UpdateShift'])->name('UpdateShift')->middleware('auth:admin');
Route::get('/delShiftconfirm/{id}', [ShiftController::class,'delShiftConfirm'])->name('DelShiftconfrim')->middleware('auth:admin');
Route::post('/delShift/{id}', [ShiftController::class,'delShift'])->name('delShift')->middleware('auth:admin');
Route::post('/delAllShift', [ShiftController::class,'deleteAll'])->name('deleteAll')->middleware('auth:admin');

#view plots result
Route::get('/ResultPlot', [PlotController::class,'ResultPlot'])->name('resultplot')->middleware('auth:admin');
Route::post('/resetplot', [PlotController::class,'resetplot'])->name('resetplot')->middleware('auth:admin');

#logistik route
Route::get('/loginLogistik', function () {
    return view('logistikLogin');
})->name('loginLogistik')->middleware('guest:admin','guest:datacaas','guest:logistik');

Route::post('/loginLog', [LogistikController::class,'login'])->name('loginLogistik');
Route::post('/PassLogistik', [LogistikController::class,'changepass'])->name('changepass')->middleware('auth:logistik');

Route::get('/logistikplot', [PlotController::class,'logistikview'])->name('listlogistik')->middleware('auth:logistik');
Route::get('/logoutLogistik', [LogistikController::class,'logout'])->name('logoutlogistik');
