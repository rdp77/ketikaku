<?php

namespace App\Http\Controllers\frontend\profile;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB; 
use Storage;
use App\d_mem;
class profileController extends Controller
{
    public function profile($name)
    {  
    	$profile = d_mem::where('m_username',$name)->first();

    	// $follow = 
        return view('frontend_view.writer_profile.detail_profile',compact('profile','comment'));
    }
}
