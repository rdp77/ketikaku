<?php

namespace App\Http\Controllers\write;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB; 
use Storage;
use Response;
class write_novelController extends Controller
{

    public function index()
    {
        $data =  DB::Table('d_novel')->select('d_novel.*','d_mem.*',
                                            DB::raw("(SELECT COUNT(d_novel_like.dnl_ref_id) FROM d_novel_like
                                                WHERE d_novel_like.dnl_ref_id = d_novel.dn_id
                                                GROUP BY d_novel_like.dnl_ref_id) as liked"),
                                            DB::raw("(SELECT COUNT(d_novel_subscribe.dns_creator) FROM d_novel_subscribe
                                                WHERE d_novel_subscribe.dns_creator = d_mem.m_id
                                                GROUP BY d_novel_subscribe.dns_creator) as subscriber"),
                                            DB::raw("(SELECT SUM(d_novel_chapter.dnch_viewer) FROM d_novel_chapter
                                                WHERE d_novel_chapter.dnch_ref_id = d_novel.dn_id
                                                GROUP BY d_novel_chapter.dnch_ref_id) as viewer")
                                    )
                                    ->join('d_mem','m_id','dn_created_by')
                                    ->where('dn_created_by',Auth::user()->m_id)
                                    ->get();
        return view('write.novel.index',compact('data'));
    }
    public function create()
    {   

        if (Auth::user() == null) {
            return view('auth.login');
        }elseif (Auth::user()->m_isactive == 'N') {
            return view('page.error-401');
        }else{
            $cat = DB::table('m_category')->get();
            $tags = DB::table('d_novel_tags')->select('dnt_name')->groupBy('dnt_name')->get();
            return view('write.novel.create',compact('cat','tags'));
        }
    }
    public function save(Request $req)
    {
        // dd($req->all());

        $file = $req->file('dn_cover');
        $check_incre = DB::Table('d_novel')->max('dn_id');
        if ($check_incre == null) {
            $check_incre = 1;
        }else{
            $check_incre += 1;
        }
        if ($file != null) {
            $photo = 'novel/cover_'.$check_incre.'.png'/*$file->getClientOriginalExtension()*/;
            Storage::put($photo,file_get_contents($req->file('dn_cover')));
        }else{
            // return Response::json(['status'=>0,'message'=>'Please Put Your Photo...']);
            $photo = null;
        }

        $data = DB::table('d_novel')->insert([
                'dn_id'=>$check_incre,
                'dn_cover'=>$photo,
                'dn_title'=>$req->dn_title,
                'dn_status'=>$req->dn_status,
                'dn_description'=>$req->dn_description,
                'dn_category'=>$req->dn_category,
                'dn_created_at'=>date('Y-m-d h:i:s'),
                'dn_created_by'=>Auth::user()->m_id,
        ]);

        for ($i=0; $i <count($req->dn_tags) ; $i++) { 
             $data = DB::table('d_novel_tags')->insert([
                'dnt_name'=>$req->dn_tags[$i],
                'dnt_ref_id'=>$check_incre,
             ]);
        }

        if ($data == true) {
        	return response()->json(['status'=>'sukses']);
        }else{
        	return response()->json(['status'=>'gagal']);
        }

    }
    public function edit($id)
    {
        $cat = DB::table('m_category')->get();
    	// $data = DB::table('d_novel')->where('s_id',$id)->first();
        $data =  DB::Table('d_novel')->where('dn_id',$id)->first();
        $tags =  DB::Table('d_novel_tags')->where('dnt_ref_id',$id)->get();

        return view('write.novel.edit',compact('data','tags','cat'));
    }
    public function update(Request $request)
    {
    	// dd($request->all());

        $file = $request->file('dn_cover');
        $check = DB::table('d_novel')->where('dn_id',$request->dn_id)->get();
        // return $check;
        if ($request->dn_cover != null) {
            // if ($file != null) {
                // if ($photo == null) {
                    $photo = 'novel/cover_'.$check[0]->dn_id.'.png'/*$file->getClientOriginalExtension()*/;
                    Storage::put($photo,file_get_contents($request->file('dn_cover')));# code...
                // }else{
                    // $photo = $check[0]->dn_cover;
                // Storage::put($photo,file_get_contents($request->file('dn_cover')));
                // }
            // }else{
            // $photo = $check[0]->dn_cover;
            // }

            $data = DB::table('d_novel')->where('dn_id',$request->dn_id)->update([
                'dn_cover'=>$photo,
                'dn_title'=>$request->dn_title,
                'dn_status'=>$request->dn_status,
                'dn_description'=>$request->dn_description,
                'dn_category'=>$request->dn_category,
                'dn_updated_at'=>date('Y-m-d h:i:s'),
                'dn_updated_by'=>Auth::user()->m_id,
            ]);
        }else{
            $data = DB::table('d_novel')->where('dn_id',$request->dn_id)->update([
                'dn_title'=>$request->dn_title,
                'dn_status'=>$request->dn_status,
                'dn_description'=>$request->dn_description,
                'dn_category'=>$request->dn_category,
                'dn_updated_at'=>date('Y-m-d h:i:s'),
                'dn_updated_by'=>Auth::user()->m_id,
            ]);
        }
        $deltags = DB::table('d_novel_tags')->where('dnt_ref_id',$request->dn_id)->delete();
        for ($i=0; $i <count($request->dn_tags) ; $i++) { 
             $data = DB::table('d_novel_tags')->insert([
                'dnt_name'=>$request->dn_tags[$i],
                'dnt_ref_id'=>$request->dn_id,
             ]);
        }
        

        if ($data == true) {
            return response()->json(['status'=>'sukses']);
        }else{
            return response()->json(['status'=>'gagal']);
        }
    }
    public function delete($id)
    {
        $check = DB::table('d_novel')->where('dn_id',$id)->delete();
        $check_cmnt = DB::table('d_novel_chapter_comment')->where('dncc_ref_id',$id)->delete();
        $check_cmnt_dt = DB::table('d_novel_chapter_comment_dt')->where('dnccdt_ref_id',$id)->delete();
        $check_scb = DB::table('d_novel_subscribe')->where('dns_ref_id',$id)->delete();
        $check_rvw = DB::table('d_novel_rate')->where('dr_ref_id',$id)->delete();
        $check_rvw_dt = DB::table('d_novel_rate_dt')->where('drdt_ref_id',$id)->delete();
    	$check_dt = DB::table('d_novel_chapter')->where('dnch_ref_id',$id)->delete();

    	// if ($check == true) {
    		return response()->json(['status'=>'sukses']);
     //    }else{
     //    	return response()->json(['status'=>'gagal']);	
    	// }
    }
}
