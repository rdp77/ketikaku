<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
class loginController extends Controller
{

	public function index()
	{
		// return 'a';
        return view('welcome');
	}
    public function authenticate(Request $req)
    {
    	$rules = array(
    		'username' => 'required',
    		'password' => 'required'
    	);

    	$validator = Validator::make($req->all(),$rules);

    	if ($validator->fails()) {
    		return redirect(url( path('/'))->with(['gagal'=>'gagal']));
    	}


    	$user = d_mem::where(DB::raw('BINARY m_username'),$req->username)->first();

    	if ($user && $user->m_password == sha1(md5('لا إله إلاّ الله') . $req->password)) {

    		// Auth::guard('name')
    		Auth::login($user);
    		return redirect(url('/home'));
    	}else{
    		return redirect(url('/welcome'))->with(['gagal'=>'gagal']);
    	}
    }
}
