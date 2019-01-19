<?php

namespace App\Http\Controllers\novel_frontend;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB; 
use Storage;
class chapterController extends Controller
{
    public function chapter($name)
    {  
    	// return $name;
        $title = str_replace('-', ' ',$name);
        $chapter = DB::table('d_novel_chapter')
        				->join('d_mem','m_id','=','dnch_created_by')
        				->join('d_novel','d_novel.dn_id','=','d_novel_chapter.dnch_ref_id')
        				->where('dnch_title',$title)
        				->first();

        $all_chapter = DB::table('d_novel_chapter')->where('dnch_ref_id',$chapter->dnch_ref_id)->get();
        // return response()->json(['chapter'=>$chapter,'title'=>$title,'all_chapter'=>$all_chapter]);
        return view('novel_frontend.detail_chapter.detail_chapter',compact('title','chapter','all_chapter'));
    }
    public function subscribe(Request $request)
    {
        // dd($request->all());
        $check_data = DB::table('d_novel_subscribe')
                            ->where('dns_ref_id',$request->id)
                            ->where('dns_subscribe_by',Auth::user()->m_id)
                            ->get();
        $check_hitung = count($check_data);

        if ($check_hitung < 1) {
            $insert =  DB::table('d_novel_subscribe')
                        ->insert([
                            'dns_ref_id'=>$request->id,
                            'dns_subscribe_by'=>Auth::user()->m_id,
                            'dns_created_at'=>date('Y-m-d H:i:s')
                        ]);
        }else{
            $update =  DB::table('d_novel_subscribe')
                        ->where('dns_ref_id',$request->id)
                        ->where('dns_subscribe_by',Auth::user()->m_id)
                        ->delete();
        }
        $total_subscribe = DB::table('d_novel_subscribe')
                            ->where('dns_ref_id',$request->id)
                            ->count();
        return response()->json(['status'=>'sukses','total_subscribe'=>$total_subscribe]);
        // return $insert;

    }
}
