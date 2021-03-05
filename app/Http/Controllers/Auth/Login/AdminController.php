<?php

namespace App\Http\Controllers\Auth\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Route;
use App\Models\Admin;
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
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected $redirectTo = '/loginAdmin';
    //public function __construct(){
	//	$this->middleware('guest:datacaas', ['except' => ['logoutCaas']]);
	//}
	
	public function login(Request $request){
		
		
		// Validate the form data
		$this->validate($request, [
			'kodas'      => 'required|min:3|string',
			'password'  => 'required|min:3|string',
		]);
		
		// Attempt to log the user in
		if (Auth::guard('admin')->attempt(
			['kodas' => $request->kodas, 'password' => $request->password], true)) {
			
			return redirect('adminHome');
		} 
		
		return redirect()->back()->with(['error' => 'Kodas / Password Salah']);
	}
	
	public function logout() {
		Auth::guard('admin')->logout();
		return redirect('/');
	}

	public function changepass(Request $request){
		$id = Auth::id();
		$admin = Admin::find($id);
		Admin::where('id',$id)->update([
			'nama'=>$admin->nama,
			'kodas'=>$admin->kodas,
			'password'=>Hash::make($request->password),
		]);
		Auth::guard('admin')->logout();
		return redirect('loginAdmin');
	} 

	public function home(){
		$id = Auth::id();
		$admin = Admin::find($id);
		$message = Messageceklulus::find(1);
		$pengumuman = Ceklulus::find(1);
		$namatahap = Namatahap::all();
		$tahapactive = Statustahap::find(1);
		return view('adminHome',compact('admin','message','pengumuman','namatahap','tahapactive'));
	}
	
}
