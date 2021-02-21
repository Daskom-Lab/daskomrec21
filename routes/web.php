<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Login\DatacaasController;
use App\Http\Controllers\Auth\Login\AdminController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\PlotController;
use App\Models\Datacaas;
use App\Models\Admin;
use App\Models\Status;
use App\Models\Tahap;
use App\Models\Statustahap;
use App\Models\Namatahap;
use App\Models\Ceklulus;
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

Route::get('/begin', function () {
    return view('master');
});

Route::get('/', function () {
    return view('main');
})->name('main')->middleware('guest:admins');

Route::get('/checkyournim', function () {
    return view('nimchecker');
});

Route::get('/home', function () {
    $id = Auth::id();
    $caas = Datacaas::find($id);
    return view('home',$caas);
})->name('home')->middleware('auth:datacaas');

Route::get('/adminHome', function () {
    $id = Auth::id();
    $admin = Admin::find($id);
    return view('adminHome',$admin);
})->name('home')->middleware('auth:admins');

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest:admins','guest:datacaas');

Route::get('/loginAdmin', function () {
    return view('loginAdmin');
})->name('loginAdmin')->middleware('guest:admins','guest:datacaas');

Route::get('/CaasAccount', function () {
    $caas = DB::table('datacaas')
                ->leftjoin('statuses','datacaas.id','=','statuses.datacaas_id')
                ->leftjoin('tahaps','tahaps.id','=','statuses.tahaps_id')
                ->orderBy('statuses.tahaps_id', 'desc')->get();
    return view('CaasAccount',compact('caas')); 
})->name('CaasAccount')->middleware('auth:admins');

Route::post('/AddCaas', [DatacaasController::class,'add'])->name('Add')->middleware('auth:admins');

Route::post('/loginCaas', [DatacaasController::class,'login'])->name('loginCaas');
Route::get('/logoutCaas', [DatacaasController::class,'logout'])->name('logoutCaas');
Route::post('/loginAdmin', [AdminController::class,'login'])->name('loginAdmin');
Route::get('/logoutAdmin', [AdminController::class,'logout'])->name('logoutAdmin');

Route::get('/ceklulus', [StatusController::class,'check'])->name('ceklulus')->middleware('auth:datacaas');

Route::get('/shift', [PlotController::class,'showplot'])->name('shift')->middleware('auth:datacaas');
