<?php

namespace App\Http\Controllers\mail;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB; 
use Mail;
use Storage;
class verify_emailController extends Controller
{
    public function verify_email()
    {  
    	$email = Auth::user()->m_email;
    	$username = Auth::user()->m_username;
    	$token = Auth::user()->m_token;
    	$code = Auth::user()->m_code;

    	$mail = Mail::send('mail.mail_verification', 
                    ['username' => $username,
                     'token' => $token,
                     'code' => $code
                    ], function($message) use ($email,$username,$token,$code){
                        $message->from('system@ketikaku.com', 'KETIKAKU')
                            ->to($email)
                            ->subject('Verify Your Email');
                    });

  		return response()->json(['status'=>'sukses']);
    }
}
