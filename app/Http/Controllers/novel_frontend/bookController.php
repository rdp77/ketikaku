<?php

namespace App\Http\Controllers\novel_frontend;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB; 
use Storage;
class bookController extends Controller
{
    public function book($name)
    {  

        $title = str_replace('-', ' ', $name);
        $code = DB::table('d_novel')
                    ->where('dn_title',$title)
                    ->first();
        // return json_encode($code->dn_id);
        $novel = DB::table('d_novel')
                    ->where('dn_created_by','=',$code->dn_created_by)
                    ->where('dn_title','=',$title)
                    // ->where('dn_status',1)
                    ->get();

        $book = DB::table('d_novel')
                    ->join('d_mem','m_id','=','dn_created_by')
                    ->where('dn_id',$code->dn_id)
                    ->first();

        $q_total_book = DB::table('d_novel')
                    ->where('dn_created_by',Auth::user()->m_id)
                    ->get();
        
        $total_book = count($q_total_book);

        if ($code->dn_type_novel == 1) {
            $chapter = DB::table('d_novel_chapter')
                    ->where('dnch_ref_id',$code->dn_id)
                    ->where('dnch_status',1)
                    ->get();
        }else{
            $chapter = DB::table('d_novel_chapter')
                    ->where('dnch_ref_id',$code->dn_id)
                    ->get();
        }

        $novel_rate = DB::table('d_novel_rate')
                    ->join('d_mem','m_id','dr_rated_by')
                    ->where('dr_ref_id',$code->dn_id)
                    ->orderBy('dr_id','DESC')
                    ->get();

        for ($i=0; $i <count($novel_rate) ; $i++) { 
            $novel_reply = DB::table('d_novel_rate_dt')
                    ->join('d_mem','m_id','drdt_reply_by')
                    ->where('drdt_ref_id',$code->dn_id)
                    // ->orWhere('drdt_ref_rate_id',$novel_rate[$i]->dr_id)
                    ->orderBy('drdt_id','ASC')
                    ->get();
        }
        // return $novel_reply;
        $total_subscribe = DB::table('d_novel_subscribe')
                            ->where('dns_ref_id',$code->dn_id)
                            ->count();
        $subscriber = DB::table('d_novel_subscribe')
                            ->where('dns_ref_id',$code->dn_id)
                            ->count();

        
        
        // return response()->json([$novel_reply,$novel_rate]);
        $tags = DB::table('d_novel_tags')
                    ->where('dnt_ref_id',$code->dn_id)
                    ->get();

        // return response()->json(['chapter'=>$chapter,'book'=>$book,'tags'=>$tags,'code'=>$code,'novel'=>$novel]);
        return view('novel_frontend.detail_novel.detail_novel',compact('book','chapter','tags','novel','total_book','novel_rate','novel_reply','total_subscribe','subscriber'));
    }
    public function novel_rate_star(Request $request)
    {
        // dd($request->all());
        $check_data = DB::table('d_novel_rate')
                    ->where('dr_ref_id',$request->id)
                    ->where('dr_rated_by',$request->dr_rated_by)
                    ->get();

        $check_count = count($check_data);
        if ($check_count > 0) {
            $update = DB::table('d_novel_rate')
                    ->where('dr_ref_id',$request->id)
                    ->where('dr_rated_by',$request->dr_rated_by)
                    ->update([
                        'dr_rate'=>$request->rate,
                        'dr_message'=>$request->message,
                        'dr_created_at'=>date('Y-m-d h:i:s'),
                        'dr_updated_at'=>date('Y-m-d h:i:s')
                    ]);

        }else{
            $insert = DB::table('d_novel_rate')
                    ->insert([
                        'dr_ref_id'=>$request->id,
                        'dr_rate'=>$request->rate,
                        'dr_message'=>$request->message,
                        'dr_rated_by'=>$request->dr_rated_by,
                        'dr_created_at'=>date('Y-m-d h:i:s')
                    ]);
        }
        $novel_rate = DB::table('d_novel_rate')
                    ->join('d_mem','m_id','dr_rated_by')
                    ->where('dr_ref_id',$request->id)
                    ->orderBy('dr_id','DESC')
                    ->get();
        $novel_reply = DB::table('d_novel_rate_dt')
                    ->join('d_mem','m_id','drdt_reply_by')
                    ->where('drdt_ref_id',$request->id)
                    ->orderBy('drdt_id','ASC')
                    ->get();
        return view('novel_frontend.detail_novel.comment_novel',compact('novel_rate','novel_reply'));
        // return response()->json(['status'=>'sukses']);

    }
    public function novel_rate_reply(Request $request)
    {
        // dd($request->all());
        $insert = DB::table('d_novel_rate_dt')
                    ->insert([
                        'drdt_ref_id'=>$request->id,
                        'drdt_ref_rate_id'=>$request->drdt_ref_rate_id,
                        'drdt_message'=>$request->message,
                        'drdt_reply_by'=>$request->drdt_reply_by,
                        'drdt_created_at'=>date('Y-m-d h:i:s')
                    ]);
        $novel_rate = DB::table('d_novel_rate')
                    ->join('d_mem','m_id','dr_rated_by')
                    ->where('dr_ref_id',$request->id)
                    ->orderBy('dr_id','DESC')
                    ->get();
        $novel_reply = DB::table('d_novel_rate_dt')
                    ->join('d_mem','m_id','drdt_reply_by')
                    ->where('drdt_ref_id',$request->id)
                    ->orderBy('drdt_id','ASC')
                    ->get();
        return view('novel_frontend.detail_novel.comment_novel',compact('novel_rate','novel_reply'));
    }
}
