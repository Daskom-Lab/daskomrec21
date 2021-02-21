<?php

namespace App\Http\Controllers\Auth\Login;
use Illuminate\Support\Facades\Auth;
use App\Models\Datacaas;
use App\Models\Status;
use App\Models\Tahap;
use App\Models\Statustahap;
use App\Models\Namatahap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Route;
use App\Http\Controllers\Controller;

class DatacaasController extends Controller
{
    protected $redirectTo = '/login';
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
		if (Auth::guard('datacaas')->attempt(
			['nim' => $request->nim, 'password' => $request->password], true)) {
			
			
			return redirect('home');
		} 

        echo "Login gagal";
		
		return redirect('login');
	}
	
	public function logout() {
		Auth::guard('datacaas')->logout();
		return redirect('login');
	}

	public function add(Request $request){
		// Datacaas::
        //         ->leftjoin('statuses','datacaas.id','=','statuses.datacaas_id')
        //         ->leftjoin('tahaps','tahaps.id','=','statuses.tahaps_id')
        //         ->orderBy('statuses.tahaps_id', 'desc')->create([
		// 	'nama'=>$request->nama,
		// 	'nim'=>$request->nim,
		// 	'email'=>$request->email,
		// 	'password'=>$request->password,
		// 	'isLolos'=>$request->isLolos,
		// 	'isLolos'=>$request->isLolos,
		// 		]);
		$caas = Datacaas::create([
			'nama'=>$request->nama,
			'nim'=>$request->nim,
			'email'=>$request->email,
			'password'=>Hash::make($request->password),
		]);
		$tahap = Tahap::create([
			'urut_tahap'=>$request->urut_tahap,
		]);
		Status::create([
			'datacaas_id'=>$caas->id,
			'tahaps_id'=>$tahap->id,
			'isLolos'=>$request->isLolos,
		]);
		
		
		return redirect('CaasAccount');
	}

}
