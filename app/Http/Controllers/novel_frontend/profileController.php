<?php

namespace App\Http\Controllers\novel_frontend;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB; 
use Storage;
class profileController  extends Controller
{
    public function profile($name)
    {  

    	// return $name;
    	
        return view('novel_frontend.detail_novel.detail_novel',compact('book','chapter','tags'));
    }
}
