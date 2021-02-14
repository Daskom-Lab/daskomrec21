<?php

namespace App\Http\Controllers\Auth\Login;
use Illuminate\Support\Facades\Auth;
use App\Models\Datacaas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DatacaasController extends Controller
{
    //protected $redirectTo = '/login';
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
			['nim' => $request->nim, 'password' => $request->password], false)) {
	
			return '{"message": "success"}';
		} 

        return '{"message": "Login Failed"}';
	}
	
	public function logout(){

		Auth::guard('datacaas')->logout();
		return redirect('/home');
	}
}
