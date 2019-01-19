<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\d_mem;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    public function index()
    {
        return view('welcome');
    }
    // use AuthenticatesUsers;
    public function login(Request $req)
    {
        $rules = array(
            'username' => 'required',
            'password' => 'required'
        );

        $validator = Validator::make($req->all(),$rules);

        if ($validator->fails()) {
            return redirect()->route('welcome_1')->with('gagal','salah user/password');
        }


        $user = d_mem::where(DB::raw('BINARY m_username'),$req->username)->first();

        if ($user && $user->m_password == sha1(md5('لا إله إلاّ الله') . $req->password)) {

            // Auth::guard('name')
            Auth::login($user);
            return redirect(url('/home'));
        }else{
            return redirect()->route('welcome_1')->with('gagal','salah user/password');
        }
    }

    use AuthenticatesUsers;

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}
