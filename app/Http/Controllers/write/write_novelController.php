<?php

namespace App\Http\Controllers\write;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB; 
use Storage;

class write_novelController extends Controller
{

    public function index()
    {

        $data =  DB::Table('d_novel')->get();
        return view('write.novel.index',compact('data'));
    }
    public function create()
    {
        return view('write.novel.create');
    }
    public function save(Request $req)
    {
        // dd($request->all());

        $file = $req->file('dn_cover');
        $check_incre = DB::Table('d_novel')->max('dn_id');
        if ($check_incre == null) {
            $check_incre = 1;
        }else{
            $check_incre += 1;
        }

        if ($file != null) {

            $photo = 'novel/cover_'.$check_incre.'.'.$file->getClientOriginalExtension();

            Storage::put($photo,file_get_contents($req->file('dn_cover')));
        }else{
            // if ($check != null) {
                // $photo = $check->mi_image;
            // }else{
                return Response::json(['status'=>0,'message'=>'Please Put Your Photo...']);
            // }
        }

        $data = DB::table('d_novel')->insert([
                'dn_id'=>$check_incre,
                'dn_cover'=>$photo,
                'dn_title'=>$req->dn_title,
                'dn_description'=>$req->dn_description,
                'dn_created_at'=>date('Y-m-d h:i:s'),
                'dn_created_by'=>Auth::user()->id,
        ]);

        if ($data == true) {
        	return response()->json(['status'=>'sukses']);
        }else{
        	return response()->json(['status'=>'gagal']);
        }

    }
    public function edit($id)
    {
    	$data = DB::table('d_site')->where('s_id',$id)->first();

        return view('write.write_site.edit',compact('data'));
    }
    public function update(Request $request)
    {
    	//get all name/value
        $input = $request->except('s_id');
    	//check unique row , if exist == 1
    	// $check = DB::table('d_site')->where('r_level',$request->r_level)->count();
    	$check = DB::table('d_site')
                        ->where('s_id',$request->s_id)
                        ->first();

        if ($check != null) {
            if ($check->s_id != $request->s_id) {
                return response()->json(['status'=>'ada']);
            }
        }
    	//save data
        $data = d_site::where('s_id', $request->s_id)->update($input);
        //return response 
        if ($data == true) {
        	return response()->json(['status'=>'sukses']);
        }else{
        	return response()->json(['status'=>'gagal']);
        }
    }
    public function delete($id)
    {
    	$check = DB::table('d_site')->where('s_id',$id)->delete();

    	if ($check == true) {
    		return response()->json(['status'=>'sukses']);
        }else{
        	return response()->json(['status'=>'gagal']);	
    	}
    }
}
