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

    public function index($id)
    {
        $data  =  DB::Table('d_novel_chapter')
                                ->join('d_novel','d_novel.dn_id','=','d_novel_chapter.dnch_ref_id')
                                ->join('d_mem','d_mem.m_id','=','d_novel_chapter.dnch_created_by')
                                ->where('dnch_ref_id',$id)
                                ->get();
        $id       = $id;
        $title    = $data[0]->dn_title;
        $username = $data[0]->m_username;
        return view('write.chapter.index',compact('data','id','title','username'));
    }
    public function create($id)
    {
        $title =  DB::Table('d_novel')->where('dn_id',$id)->first();
        return view('write.chapter.create',compact('title'));
    }
    public function save(Request $req)
    {
        // dd($req->all());
        $data = DB::table('d_novel_chapter')->insert([
            'dnch_ref_id'=>$req->dnch_ref_id,
            'dnch_title'=>$req->dnch_title,
            'dnch_status'=>$req->dnch_status,
            'dnch_content'=>$req->dnch_content,
            'dnch_created_at'=>date('Y-m-d h:i:s'),
            'dnch_created_by'=>Auth::user()->m_id,
        ]);
        $check = DB::table('d_novel')
                        ->join('d_novel_chapter','d_novel_chapter.dnch_ref_id','dn_id')
                        ->where('dnch_ref_id',$req->dnch_ref_id)->orderBy('dnch_id','DESC')->first();
         // dd($check);               
        $chek = DB::table('d_novel_subscribe')->where('dns_subscribe_by',Auth::user()->m_id)->get();
        for ($i=0; $i <count($chek) ; $i++) { 
            $d = DB::table('d_novel_notif_chapter')->insert([
                'dnnc_creator'=>Auth::user()->m_id,
                'dnnc_subscriber'=>$chek[$i]->dns_creator,
                'dnnc_chapter'=>$check->dnch_id,
                'dnnc_novel'=>$req->dnch_ref_id,
                'dnnc_read'=>'N'
            ]);
        }

        // return 'a';


        if ($data == true){
        	return response()->json(['status'=>'sukses',]);
        }else{
        	return response()->json(['status'=>'gagal']);
        }

    }
    public function edit($id)
    {
    	$data = DB::table('d_novel_chapter')
                ->join('d_novel','d_novel.dn_id','=','d_novel_chapter.dnch_ref_id')
                ->where('dnch_id',$id)
                ->first();
                // return $data;

        return view('write.chapter.edit',compact('data'));
    }
    public function update(Request $req)
    {
        // dd($req->all());
    	//get all name/value
        // return $data = DB::table('d_novel_chapter')->where('dnch_ref_id',$req->dnch_ref_id)->where('dnch_id',$req->dnch_id)->get();
         $data = DB::table('d_novel_chapter')->where('dnch_ref_id',$req->dnch_ref_id)->where('dnch_id',$req->dnch_id)->update([
            'dnch_title'=>$req->dnch_title,
            'dnch_status'=>$req->dnch_status,
            'dnch_content'=>$req->dnch_content,
            'dnch_updated_at'=>date('Y-m-d h:i:s'),
        ]);

        //return response 
        if ($data == true) {
        	return response()->json(['status'=>'sukses']);
        }else{
        	return response()->json(['status'=>'gagal']);
        }
    }
    public function delete(Request $req,$id)
    {
    	$check = DB::table('d_novel_chapter')->where('dnch_ref_id',$req->dnch_ref_id)->where('dnch_id',$id)->delete();

    	if ($check == true) {
    		return response()->json(['status'=>'sukses']);
        }else{
        	return response()->json(['status'=>'gagal']);	
    	}
    }
}
