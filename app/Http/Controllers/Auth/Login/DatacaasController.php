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

	public function edit($datacaas_id){
		$caas = Datacaas::where('datacaas.id', $datacaas_id)
                ->leftjoin('statuses','datacaas.id','=','statuses.datacaas_id')
                ->leftjoin('tahaps','tahaps.id','=','statuses.tahaps_id')
                ->orderBy('statuses.tahaps_id', 'desc')->first();
		$namatahap = Namatahap::get();
		echo $caas;
		return view('EditCaasAccount',[
			'datacaas_id'=>$caas->id,
			'nama'=>$caas->nama,
			'isLolos'=>$caas->isLolos,
			'urut_tahap'=>$caas->urut_tahap,
			'nim'=>$caas->nim,
			'datacaas_id'=>$caas->datacaas_id,
			'email'=>$caas->email,
			'namatahap'=>$namatahap,
			]);
	}

	public function update($datacaas_id,Request $request){
		$a = Datacaas::find($datacaas_id);
		$caas = Datacaas::where('datacaas.id',$datacaas_id)
                ->leftjoin('statuses','datacaas.id','=','statuses.datacaas_id')
                ->leftjoin('tahaps','tahaps.id','=','statuses.tahaps_id')
                ->orderBy('statuses.tahaps_id', 'desc')->update([
					'nama'=>$a->nama,
					'nim'=>$a->nim,
					'email'=>$a->email,
					'password'=>$a->password,
					'datacaas.id'=>$datacaas_id,
					'isLolos'=>$request->isLolos,
					'urut_tahap'=>$request->urut_tahap,
				]);
		return redirect('CaasAccount');
	}

	public function cari(Request $request){
		$find = $request->find;
		$caas = Datacaas::where('nim','like',$find."%")
				->leftjoin('statuses','datacaas.id','=','statuses.datacaas_id')
				->leftjoin('tahaps','tahaps.id','=','statuses.tahaps_id')
				->orderBy('statuses.tahaps_id', 'desc')->paginate();
		$namatahap = Namatahap::get();
		return view('CaasAccount',compact('caas','namatahap')); 
	}

	public function del($datacaas_id){
		$caas = Datacaas::find($datacaas_id);
		$caas -> delete();
		return redirect('CaasAccount');
	}
}
