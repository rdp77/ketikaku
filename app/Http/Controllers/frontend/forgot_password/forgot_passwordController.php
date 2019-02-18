<?php

namespace App\Http\Controllers\frontend\forgot_password;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB; 
use Storage;
use App\d_mem;
use Mail;
use Redirect;
class forgot_passwordController extends Controller
{
    public function page_email()
    {
    	return view('frontend_view.forgot_password.page_email');
    }
    public function send_email(Request $request)
    {
    	$data = DB::table('d_mem')->where('m_email',$request->email)->first();
    	if ($data != null) {
    		$username = $data->m_username;
	    	$token = $data->m_token;
	    	$code = $data->m_id;
	    	$email = $data->m_email;
	    	
    		$mail = Mail::send('mail.mail_forgot_password', 
                    ['username' => $username,
                     'token' => $token,
                     'code' => $code
                    ], function($message) use ($email,$username,$token,$code){
                        $message->from('system@ketikaku.com', 'KETIKAKU')
                            ->to($email)
                            ->subject('Email Forgot Password');
                    });

    		return Redirect::back()->withErrors(['sukses']);
    	}elseif($data == null){
    		return Redirect::back()->withErrors(["kosong"]);
    	}else{
    		return Redirect::back()->withErrors(['error']);
    	}
    }
    public function page_reset_password($token,$id)
    {
    	$data = DB::table('d_mem')->where('m_id',$id)->first();
    	return view('frontend_view.forgot_password.page_reset_password',compact('data'));
    }
    public function send_reset_password (Request $request)
    {
    	$update = DB::table('d_mem')
    					->where('m_id',$request->id)
    					->update([
    						'm_password'=>sha1(md5('لا إله إلاّ الله') . $request->password)
    					]);
    	return response()->json(['status'=>'sukses']);
    }
}
