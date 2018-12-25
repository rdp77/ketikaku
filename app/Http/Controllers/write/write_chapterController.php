<?php

namespace App\Http\Controllers\write;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB; 
use Storage;
use App\d_chapter;
class write_chapterController extends Controller
{

    public function index()
    {

        $data =  DB::Table('d_novel_chapter')->join('d_novel','d_novel.dn_id','=','d_novel_chapter.dnch_ref_id')->get();
        return view('write.chapter.index',compact('data'));
    }
    public function create()
    {
        $title =  DB::Table('d_novel')->get();
        return view('write.chapter.create',compact('title'));
    }
    public function save(Request $req)
    {
        // dd($req->all());
        // return $input = $req->all();
        $data = DB::table('d_novel_chapter')->insert([
            'dnch_ref_id'=>$req->dnch_ref_id,
            'dnch_title'=>$req->dnch_title,
            'dnch_content'=>$req->dnch_content,
            'dnch_created_at'=>date('Y-m-y h:i:s'),
            'dnch_created_by'=>Auth::user()->id,
        ]);

        if ($data == true){
        	return response()->json(['status'=>'sukses',]);
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
