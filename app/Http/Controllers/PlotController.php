<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Datacaas;
use App\Models\Status;
use App\Models\Tahap;
use App\Models\Statustahap;
use App\Models\Namatahap;
use App\Models\Ceklulus;
use App\Models\Shift;
use App\Models\Plot;
use App\Models\Plotactive;
use App\Models\Firstmeet;
use App\Models\Logistik;
use App\Models\Messageceklulus;
use Route;
use App\Http\Controllers\Controller;

class PlotController extends Controller
{
    public function ResultPlot(){
        $shift = Shift::orderBy('hari','asc')->orderBy('jam_start','asc')->paginate(10);
        $countshift = Shift::count();
        $namatahap = Namatahap::all();
        $ceklulus = Ceklulus::where('id',1)->first();
        $caas = Datacaas::all();
        \Carbon\Carbon::setLocale('id');
        $plot = PLot::leftjoin('shifts','shifts.id','=','plots.shifts_id')
            ->leftjoin('datacaas','datacaas.id','=','plots.datacaas_id')->get();
        return view('resultplot',compact('namatahap','ceklulus','countshift','shift','caas','plot'));
    }
    public function logistikview(){
        $id = Auth::id();
        $logistik = Logistik::find($id);
        $shift = Shift::orderBy('hari','asc')->orderBy('jam_start','asc')->paginate(10);
        $countshift = Shift::count();
        $namatahap = Namatahap::all();
        $ceklulus = Ceklulus::where('id',1)->first();
        $caas = Datacaas::all();
        \Carbon\Carbon::setLocale('id');
        $plot = PLot::leftjoin('shifts','shifts.id','=','plots.shifts_id')
            ->leftjoin('datacaas','datacaas.id','=','plots.datacaas_id')->get();
        return view('logistikplot',compact('namatahap','ceklulus','countshift','shift','caas','plot','logistik'));
    }

    public function listplot() {
        $id = Auth::id();
        $shift = Shift::orderBy('hari','asc')->orderBy('jam_start','asc')->paginate(10);
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
        $ceklulus = Ceklulus::where('id',1)->first();
        $firstmeet = Firstmeet::find(1);
        \Carbon\Carbon::setLocale('id');
        if($caas->isLolos==1 && $statustahap->current_tahap==$caas->urut_tahap && $ceklulus->isPlotRun==1 && $plotactive->isPlotActive==NULL){
            return view('plotchoose',compact('shift','caas','plotactive','sisakuota','plots','statustahap')); 
        }
        elseif($caas->isLolos==0 && $statustahap->current_tahap==$caas->urut_tahap && $firstmeet->isPlotFirstmeet==1 && $plotactive->isPlotActive==NULL && $caas->urut_tahap==1 ){
            return view('plotfirst',compact('shift','caas','plotactive','sisakuota','plots','statustahap','firstmeet'));
        }
        else return redirect('home');
    }

    public function takeplot($id) {
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
        $statustahap = Statustahap::where('statustahaps.id',1)
                    ->leftjoin('namatahaps','statustahaps.current_tahap','=','namatahaps.id')->first();
        $limit = $shift->kuota - $sisakuota;
        $ceklulus = Ceklulus::where('id',1)->first();
        $firstmeet = Firstmeet::find(1);
        \Carbon\Carbon::setLocale('id');
        if($caas->isLolos==1 && $plotactive->isPlotActive==NULL && $ceklulus->isPlotRun==1 && $statustahap->current_tahap==$caas->urut_tahap){
            return view('takeplot',compact('shift','caas','plotactive','limit','ceklulus','firstmeet')); 
        }elseif($caas->isLolos==0 && $statustahap->current_tahap==$caas->urut_tahap && $firstmeet->isPlotFirstmeet==1 && $plotactive->isPlotActive==NULL && $caas->urut_tahap==1 ){
            return view('takeplot',compact('shift','caas','plotactive','limit','firstmeet','ceklulus'));
        } 
        else return redirect('listplot');
    }

    public function fixtakeplot($id) {
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
        $statustahap = Statustahap::where('statustahaps.id',1)
                    ->leftjoin('namatahaps','statustahaps.current_tahap','=','namatahaps.id')->first();
        $limit = $shift->kuota - $sisakuota;
        $ceklulus = Ceklulus::where('id',1)->first();
        $firstmeet = Firstmeet::find(1);
        if($caas->isLolos==1 && $plotactive->isPlotActive==NULL && $limit>0 && $ceklulus->isPlotRun==1 && $statustahap->current_tahap==$caas->urut_tahap){
        Plot::create([
                        'datacaas_id'=>$caasid,
                        'shifts_id'=>$shift->id,
                    ]);
        Plotactive::create([
                        'datacaas_id'=>$caasid,
                        'isPlotActive'=>1,
                    ]);
            return redirect('finalPlot'); 
        }elseif($caas->isLolos==0 && $statustahap->current_tahap==$caas->urut_tahap && $firstmeet->isPlotFirstmeet==1 && $plotactive->isPlotActive==NULL && $caas->urut_tahap==1 && $limit>0){
            Plot::create([
                'datacaas_id'=>$caasid,
                'shifts_id'=>$shift->id,
            ]);
            Plotactive::create([
                'datacaas_id'=>$caasid,
                'isPlotActive'=>1,
            ]);
            return redirect('finalPlot');
        }
        else return redirect('listplot');
    }

    public function finalPlot() {
        $id = Auth::id();
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
        $statustahap = Statustahap::where('statustahaps.id',1)
                    ->leftjoin('namatahaps','statustahaps.current_tahap','=','namatahaps.id')->first();
        $ceklulus = Ceklulus::where('id',1)->first();
        $firstmeet = Firstmeet::find(1);
        \Carbon\Carbon::setLocale('id');
        if($caas->isLolos==1 && $statustahap->current_tahap==$caas->urut_tahap && $plotactive->isPlotActive==1){
            return view('finalPlot',compact('caas','plotactive','plots','statustahap','firstmeet')); 
        }elseif($caas->isLolos==0 && $caas->urut_tahap==1 && $plotactive->isPlotActive==1){
            return view('finalPlot',compact('caas','plotactive','plots','statustahap','firstmeet'));
        }
        else return redirect('home');
    }

    public function resetplot(){
        $plot = Plot::truncate();
        $plotstatus = Plotactive::truncate();
        return redirect('ListShift');
    }
}
