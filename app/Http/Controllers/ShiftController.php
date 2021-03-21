<?php

namespace App\Http\Controllers;

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
use App\Models\Messageceklulus;
use Route;
use App\Http\Controllers\Controller;

class ShiftController extends Controller
{
    
    public function ListShift()
    {
        $shift = Shift::orderBy('hari','asc')->orderBy('jam_start','asc')->paginate(10);
        $countshift = Shift::count();
        $namatahap = Namatahap::all();
        $ceklulus = Ceklulus::where('id',1)->first();
        \Carbon\Carbon::setLocale('id');
        return view('shift',compact('shift','namatahap','ceklulus','countshift'));
    }

    public function addShift(Request $request){
        Shift::create([
            'namashift'=>$request->namashift,
            'hari'=>$request->hari,
            'jam_start'=>$request->jam_start,
            'jam_end'=>$request->jam_end,
            'kuota'=>$request->kuota,
        ]);
        return redirect('ListShift');
    }

    public function EditShift($id){
        $shift = Shift::where('id',$id)->first();
        $ceklulus = Ceklulus::where('id',1)->first();
        if($ceklulus->isPlotRun==0)
        return view('editshift',[
            'id'=>$shift->id,
            'namashift'=>$shift->namashift,
            'hari'=>$shift->hari,
            'jam_start'=>$shift->jam_start,
            'jam_end'=>$shift->jam_end,
            'kuota'=>$shift->kuota,
        ]);
        else return redirect('ListShift');
    }

    public function UpdateShift($id, Request $request){
        $ceklulus = Ceklulus::where('id',1)->first();
        if($ceklulus->isPlotRun==0){
        Shift::where('id',$id)->update([
            'namashift'=>$request->namashift,
            'hari'=>$request->hari,
            'jam_start'=>$request->jam_start,
            'jam_end'=>$request->jam_end,
            'kuota'=>$request->kuota,
        ]);
        return redirect('ListShift');}
        else return redirect('ListShift');
    }

    public function delShiftConfirm($id){
        $shift = Shift::where('id',$id)->first();
        $ceklulus = Ceklulus::where('id',1)->first();
        if($ceklulus->isPlotRun==0)
        return view('delshift',[
            'id'=>$shift->id,
            'namashift'=>$shift->namashift,
            'hari'=>$shift->hari,
            'jam_start'=>$shift->jam_start,
            'jam_end'=>$shift->jam_end,
            'kuota'=>$shift->kuota,
        ]);
        else return redirect('ListShift');
    }

    public function delShift($id){
        $ceklulus = Ceklulus::where('id',1)->first();
        if($ceklulus->isPlotRun==0){
        $shift = Shift::where('id',$id)->delete();
        return redirect('ListShift');}
        else return redirect('ListShift');
    }

    public function deleteAll(){
        $shift = Shift::whereNotNull('id')->delete();
        $plot = Plot::whereNotNull('id')->delete();
        $plotstatus = Plotactive::whereNotNull('id')->delete();
        return redirect('ListShift');
    }

}
