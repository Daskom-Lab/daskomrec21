<?php

namespace App\Http\Controllers\Auth\Login;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Route;
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
			'nim'      => 'required|min:1|string',
			'password'  => 'required|min:1|string',
		]);
		
		// Attempt to log the user in
		if (Auth::guard('admins')->attempt(
			['nim' => $request->nim, 'password' => $request->password], true)) {
			
			return redirect('adminHome');
		} 

        echo "Login gagal";
		
		return redirect('loginAdmin');
	}
	
	public function logout() {
		Auth::guard('admins')->logout();
		return redirect('/');
	}

	public function changepass(Request $request){
		$id = Auth::id();
		$admin = Admin::find($id);
		Admin::where('id',$id)->update([
			'nama'=>$admin->nama,
			'nim'=>$admin->nim,
			'password'=>Hash::make($request->password),
		]);
		Auth::guard('admins')->logout();
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
