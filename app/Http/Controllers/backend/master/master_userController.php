<?php

namespace App\Http\Controllers\backend\master;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB; 
use Storage;
use App\d_mem;

class master_userController extends Controller
{
    public function index()
    {
 
    	$data = d_mem::all();

    	return view('backend_view.master_user.index',compact('data'));

    }
}
