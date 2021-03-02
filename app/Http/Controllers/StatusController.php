<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datacaas;
use App\Models\Status;
use App\Models\Tahap;
use App\Models\Statustahap;
use App\Models\Namatahap;
use App\Models\Ceklulus;
use App\Models\Messageceklulus;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function check(){
        $id = Auth::id();
        $statusid = Statustahap::get();
        $CekActive = Ceklulus::find(1);
        $message = Messageceklulus::find(1);
        $caas = Datacaas::where('datacaas.id', $id)
                ->leftjoin('statuses','datacaas.id','=','statuses.datacaas_id')
                ->leftjoin('tahaps','tahaps.id','=','statuses.tahaps_id')
                ->orderBy('statuses.tahaps_id', 'desc')->first();
        $statustahap = Statustahap::where('statustahaps.id',1)
                        ->leftjoin('namatahaps','statustahaps.current_tahap','=','namatahaps.id')->first();
        $plotactive = Datacaas::where('datacaas.id',$id)
                ->leftjoin('plotactives','datacaas.id','=','plotactives.datacaas_id')
                ->first();
        return view('ceklulus',[
        'nama'=>$caas->nama,
        'isLolos'=>$caas->isLolos,
        'urut_tahap'=>$caas->urut_tahap,
        'nim'=>$caas->nim,
        'current_tahap'=>$statustahap->current_tahap,
        'namatahap'=>$statustahap->nama,
        'Active'=>$CekActive->isActiveCek,
        'lulustext'=>$message->lolostext,
        'failedtext'=>$message->notlolostext,
        'linktext'=>$message->linktext,
        'isPlotActive'=>$plotactive->isPlotActive,
        ]);
    }
}
