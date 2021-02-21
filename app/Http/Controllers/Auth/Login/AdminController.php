<?php

namespace App\Http\Controllers\Auth\Login;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Route;
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
}
