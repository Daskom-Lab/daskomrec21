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

//General Routes

Route::get('/', function () {
    return view('main');
})->name('main')->middleware('guest:admins','guest:datacaas');

//Caas Routes

Route::get('/home', function () {
    $id = Auth::id();
    $caas = Datacaas::find($id);
    $plotactive = Datacaas::where('datacaas.id',$id)
                ->leftjoin('plotactives','datacaas.id','=','plotactives.datacaas_id')
                ->first();
    return view('home',compact('caas','plotactive'));
})->name('home')->middleware('auth:datacaas');

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest:admins','guest:datacaas');

Route::post('/loginCaas', [DatacaasController::class,'login'])->name('loginCaas');

Route::get('/logoutCaas', [DatacaasController::class,'logout'])->name('logoutCaas');

Route::get('/ceklulus', [StatusController::class,'check'])->name('ceklulus')->middleware('auth:datacaas');

Route::get('/shift', [PlotController::class,'showplot'])->name('shift')->middleware('auth:datacaas');

Route::post('/PassCaas', [DatacaasController::class,'changepass'])->name('changepass')->middleware('auth:datacaas');

Route::get('/listplot', function () {
    // $shift = DB::table('plots')
    //             ->leftjoin('datacaas','shifts.id','=','plots.shifts_id')
    //             ->leftjoin('shifts','shifts.id','=','plots.shifts_id')
    //             ->orderBy('shifts.kuota', 'desc')->get();
    $id = Auth::id();
    $shift = Shift::all();
    $caas = Datacaas::where('datacaas.id',$id)
                ->leftjoin('statuses','datacaas.id','=','statuses.datacaas_id')
                ->leftjoin('tahaps','tahaps.id','=','statuses.tahaps_id')
                ->orderBy('tahaps.urut_tahap', 'desc')->first();
    $plots = Datacaas::where('datacaas.id',$id)
                ->leftjoin('plots','datacaas.id','=','plots.datacaas_id')
                ->leftjoin('shifts','shifts.id','=','plots.shifts_id')
                ->first();
    $plotactive = Datacaas::where('datacaas.id',$id)
                ->leftjoin('plotactives','datacaas.id','=','plotactives.datacaas_id')
                ->first();
    $sisakuota = Datacaas::where('plots.shifts_id',$shift)
                ->leftjoin('plots','datacaas.id','=','plots.datacaas_id')
                ->leftjoin('shifts','shifts.id','=','plots.shifts_id')
                ->get()->count();
    $statustahap = Statustahap::where('statustahaps.id',1)
                ->leftjoin('namatahaps','statustahaps.current_tahap','=','namatahaps.id')->first();
    if($caas->isLolos==1 && $statustahap->current_tahap==$caas->urut_tahap){
    return view('plotchoose',compact('shift','caas','plotactive','sisakuota','plots','statustahap')); 
    }else return redirect('home');
})->name('listplot')->middleware('auth:datacaas');

Route::get('/takeplot/{id}', function ($id) {
    $shift = Shift::find($id);
    $caasid = Auth::id();
    $caas = Datacaas::where('datacaas.id',$caasid)
                ->leftjoin('statuses','datacaas.id','=','statuses.datacaas_id')
                ->leftjoin('tahaps','tahaps.id','=','statuses.tahaps_id')
                ->orderBy('tahaps.urut_tahap', 'desc')->first();
    $plots = Datacaas::where('datacaas.id',$caasid)
                ->leftjoin('plots','datacaas.id','=','plots.datacaas_id')
                ->leftjoin('shifts','shifts.id','=','plots.shifts_id')
                ->first();
    $plotactive = Datacaas::where('datacaas.id',$caasid)
                ->leftjoin('plotactives','datacaas.id','=','plotactives.datacaas_id')
                ->first();
    $sisakuota = Plot::where('plots.shifts_id',$shift->id)
                ->leftjoin('datacaas','datacaas.id','=','plots.datacaas_id')
                ->leftjoin('shifts','shifts.id','=','plots.shifts_id')
                ->get()->count();
    $limit = $shift->kuota - $sisakuota;
    if($caas->isLolos==1 && $plotactive->isPlotActive==NULL){
    return view('takeplot',compact('shift','caas','plotactive','limit')); 
    }else return redirect('listplot');
})->name('listplot')->middleware('auth:datacaas');

Route::post('/takeplot/createplot/{id}', function ($id) {
    $shift = Shift::find($id);
    $caasid = Auth::id();
    $caas = Datacaas::where('datacaas.id',$caasid)
                ->leftjoin('statuses','datacaas.id','=','statuses.datacaas_id')
                ->leftjoin('tahaps','tahaps.id','=','statuses.tahaps_id')
                ->orderBy('tahaps.urut_tahap', 'desc')->first();
    $plots = Datacaas::where('datacaas.id',$caasid)
                ->leftjoin('plots','datacaas.id','=','plots.datacaas_id')
                ->leftjoin('shifts','shifts.id','=','plots.shifts_id')
                ->first();
    $plotactive = Datacaas::where('datacaas.id',$caasid)
                ->leftjoin('plotactives','datacaas.id','=','plotactives.datacaas_id')
                ->first();
    $sisakuota = Plot::where('plots.shifts_id',$shift->id)
                ->leftjoin('datacaas','datacaas.id','=','plots.datacaas_id')
                ->leftjoin('shifts','shifts.id','=','plots.shifts_id')
                ->get()->count();
    $limit = $shift->kuota - $sisakuota;
    if($caas->isLolos==1 && $plotactive->isPlotActive==NULL && $limit>0){
    Plot::create([
                    'datacaas_id'=>$caas->id,
                    'shifts_id'=>$shift->id,
                ]);
    Plotactive::create([
                    'datacaas_id'=>$caas->id,
                    'isPlotActive'=>1,
                ]);
    return redirect('listplot'); 
    }else return redirect('listplot');
})->name('chooseplot')->middleware('auth:datacaas');


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
})->name('adminHome')->middleware('auth:admins');

Route::get('/CaasAccount', function () {
    $caas = DB::table('datacaas')
                ->leftjoin('statuses','datacaas.id','=','statuses.datacaas_id')
                ->leftjoin('tahaps','tahaps.id','=','statuses.tahaps_id')
                ->orderBy('tahaps.urut_tahap', 'desc')->get();
    $namatahap = Namatahap::all();
    return view('CaasAccount',compact('caas','namatahap')); 
})->name('CaasAccount')->middleware('auth:admins');

Route::post('/AddCaas', [DatacaasController::class,'add'])->name('Addcaas')->middleware('auth:admins');

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

Route::get('/ListShift', function () {
    $shift = Shift::all();
    // $shift = DB::table('plots')
    //             ->leftjoin('datacaas','shifts.id','=','plots.shifts_id')
    //             ->leftjoin('shifts','shifts.id','=','plots.shifts_id')
    //             ->orderBy('shifts.kuota', 'desc')->get();

    $namatahap = Namatahap::all();
    return view('shift',compact('shift','namatahap')); 
})->name('shift')->middleware('auth:admins');

Route::post('/addShift', function(Request $request){
    Shift::create([
        'hari'=>$request->hari,
        'jam'=>$request->jam,
        'kuota'=>$request->kuota,
    ]);
    return redirect('ListShift');
})->name('addShift')->middleware('auth:admins');