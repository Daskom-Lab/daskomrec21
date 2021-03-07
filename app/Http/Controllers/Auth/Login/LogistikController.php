<?php

namespace App\Http\Controllers\Auth\Login;
use Illuminate\Support\Facades\Auth;
use App\Models\Logistik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Route;
use App\Models\Datacaas;
use App\Models\Status;
use App\Models\Tahap;
use App\Models\Statustahap;
use App\Models\Namatahap;
use App\Models\Ceklulus;
use App\Models\Shift;
use App\Models\Plot;
use App\Models\Plotactive;
use App\Http\Controllers\Controller;

class LogistikController extends Controller
{
    protected $redirectTo = '/loginLogistik';
    //public function __construct(){
	//	$this->middleware('guest:datacaas', ['except' => ['logoutCaas']]);
	//}
	
	public function login(Request $request){
		
		
		// Validate the form data
		$this->validate($request, [
			'kodastik'      => 'required|min:3|string',
			'password'  => 'required|min:8|string',
		]);
		
		// Attempt to log the user in
		if (Auth::guard('logistik')->attempt(
			['kodastik' => $request->kodastik, 'password' => $request->password], true)) {
			
			return redirect('logistikplot');
		} 
		
		return redirect()->back()->with(['error' => 'Kodas / Password Salah']);
	}

	public function logout() {
		Auth::guard('logistik')->logout();
		return redirect('loginLogistik');
	}

	public function changepass(Request $request){
		$id = Auth::id();
		$logistik = Logistik::find($id);
		$this->validate($request, [
			'password'  => 'required|min:8|string',
		]);
		Logistik::where('id',$id)->update([
			'nama'=>$logistik->nama,
			'kodastik'=>$logistik->kodastik,
			'password'=>Hash::make($request->password),
		]);
		Auth::guard('logistik')->logout();
		return redirect('loginLogistik')->with(['changed' => 'Password Berhasil diubah']);
	}
}
