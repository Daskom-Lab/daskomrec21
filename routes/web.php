<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Login\DatacaasController;
use App\Http\Controllers\Auth\Login\AdminController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\PlotController;
use App\Models\Datacaas;
use Illuminate\Http\Request;
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

//General Routes

Route::get('/', function () {
    return view('main');
})->name('main')->middleware('guest:admins');

//Caas Routes

Route::get('/home', function () {
    $id = Auth::id();
    $caas = Datacaas::find($id);
    return view('home',$caas);
})->name('home')->middleware('auth:datacaas');

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest:admins','guest:datacaas');

Route::post('/loginCaas', [DatacaasController::class,'login'])->name('loginCaas');

Route::get('/logoutCaas', [DatacaasController::class,'logout'])->name('logoutCaas');

Route::get('/ceklulus', [StatusController::class,'check'])->name('ceklulus')->middleware('auth:datacaas');

Route::get('/shift', [PlotController::class,'showplot'])->name('shift')->middleware('auth:datacaas');

//Admin Routes

Route::get('/loginAdmin', function () {
    return view('loginAdmin');
})->name('loginAdmin')->middleware('guest:admins','guest:datacaas');

Route::get('/adminHome', function () {
    $id = Auth::id();
    $admin = Admin::find($id);
    $message = Messageceklulus::find(1);
    $pengumuman = Ceklulus::find(1);
    $namatahap = DB::table('namatahaps')->get();
    $tahapactive = Statustahap::find(1);
    return view('adminHome',compact('admin','message','pengumuman','namatahap','tahapactive'));
})->name('home')->middleware('auth:admins');

Route::get('/CaasAccount', function () {
    $caas = DB::table('datacaas')
                ->leftjoin('statuses','datacaas.id','=','statuses.datacaas_id')
                ->leftjoin('tahaps','tahaps.id','=','statuses.tahaps_id')
                ->orderBy('tahaps.urut_tahap', 'desc')->get();
    $namatahap = DB::table('namatahaps')->get();
    return view('CaasAccount',compact('caas','namatahap')); 
})->name('CaasAccount')->middleware('auth:admins');

Route::post('/AddCaas', [DatacaasController::class,'add'])->name('Add')->middleware('auth:admins');

Route::post('/loginAdmin', [AdminController::class,'login'])->name('loginAdmin');

Route::get('/logoutAdmin', [AdminController::class,'logout'])->name('logoutAdmin');

Route::get('/EditCaasAccount/{datacaas_id}', [DatacaasController::class,'edit'])->name('Edit')->middleware('auth:admins');

Route::get('/delcaasconfirm/{datacaas_id}', [DatacaasController::class,'delconfirm'])->name('delconfirm')->middleware('auth:admins');

Route::post('/UpdateCaasAccount/{datacaas_id}', [DatacaasController::class,'update'])->name('Update')->middleware('auth:admins');

Route::get('/CariNIM', [DatacaasController::class,'cari'])->name('cari')->middleware('auth:admins');

Route::get('/delcaas/{datacaas_id}', [DatacaasController::class,'del'])->name('del')->middleware('auth:admins');

Route::post('/PassAdmin', [AdminController::class,'changepass'])->name('changepass')->middleware('auth:admins');

Route::post('/SetData', function(Request $request){
    Messageceklulus::where('id',1)->update([
        'id'=>1,
        'lolostext'=>$request->lolostext,
        'notlolostext'=>$request->notlolostext,
        'linktext'=>$request->linktext,
        ]);
    Ceklulus::where('id',1)->update([
        'id'=>1,
        'isActiveCek'=>$request->isActiveCek,
        ]);
    Statustahap::where('id',1)->update([
        'id'=>1,
        'current_tahap'=>$request->current_tahap,
        ]);
    return redirect('adminHome');
})->name('setdata')->middleware('auth:admins');