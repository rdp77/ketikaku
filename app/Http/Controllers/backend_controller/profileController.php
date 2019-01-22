<?php

namespace App\Http\Controllers\backend_controller;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB; 
use Storage;
class profileController extends Controller
{
    public function profile($name)
    {  
    	$novel = DB::table('d_novel')->where('dn_created_by',Auth::user()->m_id)->orderBy('dn_id','DESC')->get();
    	$q_total_book = DB::table('d_novel')->where('dn_created_by',Auth::user()->m_id)->get();
    	$total_book = count($q_total_book);
        return view('backend_view.master_user.profile_detail',compact('total_book','novel'));
    }
}
