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
        $title = str_replace('-', ' ',$name);
        $chapter = DB::table('d_novel_chapter')
        				->join('d_mem','m_id','=','dnch_created_by')
        				->join('d_novel','d_novel.dn_id','=','d_novel_chapter.dnch_ref_id')
        				->where('dnch_title',$title)
        				->first();
        $chapter_comment = DB::table('d_novel_chapter_comment')
                            ->join('d_mem','m_id','=','dncc_comment_by')
                            ->where('dncc_ref_id',$chapter->dnch_ref_id)
                            ->get();
        for ($i=0; $i <count($chapter_comment) ; $i++) { 
            $chapter_reply = DB::table('d_novel_chapter_comment_dt')
                    ->join('d_mem','m_id','dnccdt_reply_by')
                    ->orderBy('dnccdt_id','ASC')
                    ->get();
        }
        $all_chapter = DB::table('d_novel_chapter')->where('dnch_status','publish')->where('dnch_ref_id',$chapter->dnch_ref_id)->get();
        return view('novel_frontend.detail_chapter.detail_chapter_build',compact('title','chapter','all_chapter','chapter_comment','chapter_reply'));
    }
    public function subscribe(Request $request)
    {
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
    }
    public function viewer(Request $request)
    {
        $chapter = DB::table('d_novel_chapter')
                        ->select('dnch_viewer')
                        ->where('dnch_id',$request->id)
                        ->first();
        $update_view = DB::table('d_novel_chapter')
                        ->where('dnch_id',$request->id)
                        ->update([
                            'dnch_viewer'=>$chapter->dnch_viewer+1
                        ]);
         return response()->json('sukses');                
    }
    public function chapter_novel_comment(Request $request)
    {

        $insert = DB::table('d_novel_chapter_comment')
                ->insert([
                    'dncc_ref_id'=>$request->id,
                    'dncc_ref_iddt'=>$request->iddt,
                    'dncc_message'=>$request->message,
                    'dncc_comment_by'=>$request->dncc_comment_by,
                    'dncc_creator'=>$request->dncc_creator,
                    'dncc_created_at'=>date('Y-m-d h:i:s')
                ]);

        $chapter_comment = DB::table('d_novel_chapter_comment')
                            ->join('d_mem','m_id','=','dncc_comment_by')
                            ->where('dncc_ref_id',$request->id)
                            ->where('dncc_ref_iddt',$request->iddt)
                            ->get();

        $chapter_reply = DB::table('d_novel_chapter_comment_dt')
                    ->join('d_mem','m_id','dnccdt_reply_by')
                    ->orderBy('dnccdt_id','ASC')
                    ->get();

        
        return view('novel_frontend.detail_chapter.comment_chapter',compact('chapter_comment','chapter_reply'));
        // return response()->json(['status'=>'sukses']);
    }
    public function chapter_novel_comment_reply(Request $request)
    {

        $insert = DB::table('d_novel_chapter_comment_dt')
                ->insert([
                    'dnccdt_ref_id'=>$request->id,
                    'dnccdt_comment_id'=>$request->iddt,
                    'dnccdt_message'=>$request->message,
                    'dnccdt_reply_by'=>$request->dnccdt_comment_by,
                    'dnccdt_created_at'=>date('Y-m-d h:i:s')
                ]);

        $chapter_comment = DB::table('d_novel_chapter_comment')
                            ->join('d_mem','m_id','=','dncc_comment_by')
                            ->where('dncc_ref_id',$request->id)
                            ->where('dncc_ref_iddt',$request->iddt)
                            ->get();

        $chapter_reply = DB::table('d_novel_chapter_comment_dt')
                    ->join('d_mem','m_id','dnccdt_reply_by')
                    ->orderBy('dnccdt_id','ASC')
                    ->get();

        
        return view('novel_frontend.detail_chapter.comment_chapter',compact('chapter_comment','chapter_reply'));
    }
}
