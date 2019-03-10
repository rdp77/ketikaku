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
    public function update(Request $request)
    {
    	// dd($request->all());
    	$input = $request->all();
        $data = d_mem::where('m_id',Auth::user()->m_id)->update($input);
        return response()->json(['status'=>'sukses']);
    }
    public function update_image(Request $request)
    {
    	// dd($request->all());
        $check = $request->file('dn_cover');
        // return $check;
        $filename = 'photo_profile/'.'Profile_'.Auth::user()->m_username.'.png';
        Storage::put($filename,file_get_contents($check));
        $data = d_mem::where('m_id',Auth::user()->m_id)->update(['m_image'=>$filename]);

    }
    public function update_sosmed(Request $request)
    {
        // dd($request->all());
        $input = $request->all();
        $data = d_mem::where('m_id',Auth::user()->m_id)->update($input);
        return response()->json(['status'=>'sukses']);
    }
}
