<?php

namespace App\Http\Controllers\backend\mail;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB; 
use Storage;
use App\d_mem;

class verifyController extends Controller
{
    public function verify($token,$id)
    {
    		
        // $user = d_mem::where('m_token',$token)->where('m_code',$id)->firstOrFail();
        // $user->update(['m_isactive'=>'Y']);
        // return redirect()->route('home')->with('succes','Selamat Akun anda sudah terverifikasi');

    }
}
