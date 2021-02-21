<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Datacaas;
use App\Models\Shift;
use App\Models\Plot;
use Illuminate\Support\Facades\Auth;

class PlotController extends Controller
{
    public function showplot(){
        $id = Auth::id();
        $shift = Shift::where('shifts.id',1)
                ->leftJoin('plots','shifts.id','=','plots.shifts_id')
                ->leftJoin('datacaas','datacaas.id','=','plots.datacaas_id')
                ->get();
    return $shift;
    }
}
