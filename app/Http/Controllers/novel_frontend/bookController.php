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
        // return $name;
        // TITLE LINK
        $title = str_replace('-', ' ', $name);
        // CARI DATA BEDASARKAN NAMA
        $code = DB::table('d_novel')
                    ->where('dn_title',$title)
                    ->first();

        // $novel = DB::table('d_novel')
        //             ->where('dn_created_by','=',$code->dn_created_by)
        //             ->where('dn_title','=',$title)
        //             // ->where('dn_status',1)
        //             ->get();
        $novel = DB::table('d_novel')->select('d_novel.*',
                                            DB::raw("(SELECT COUNT(d_novel_like.dnl_ref_id) FROM d_novel_like
                                                WHERE d_novel_like.dnl_ref_id = d_novel.dn_id
                                                GROUP BY d_novel_like.dnl_ref_id) as liked"),
                                            DB::raw("(SELECT COUNT(d_novel_subscribe.dns_ref_id) FROM d_novel_subscribe
                                                WHERE d_novel_subscribe.dns_ref_id = d_novel.dn_id
                                                GROUP BY d_novel_subscribe.dns_ref_id) as subscribed"),
                                            DB::raw("(SELECT SUM(d_novel_chapter.dnch_viewer) FROM d_novel_chapter
                                                WHERE d_novel_chapter.dnch_ref_id = d_novel.dn_id
                                                GROUP BY d_novel_chapter.dnch_ref_id) as viewer"))
                                        ->where('dn_status','publish')
                                        ->where('dn_created_by','=',$code->dn_created_by)
                                        ->where('dn_title','=',$title)
                                        ->where('dn_type_novel',1)
                                        ->orderBy('dn_id','DESC')->limit(8)->get();
        // CARI NOVEL DENGAN KONDISI PENULIS
        $book = DB::table('d_novel')
                    ->join('d_mem','m_id','=','dn_created_by')
                    ->where('dn_id',$code->dn_id)
                    ->first();
        // CARI NOVEL DENGAN KONDISI PENULIS
        $q_total_book = DB::table('d_novel')
                    ->where('dn_created_by',$code->dn_created_by)
                    ->get();
        // MENGHITUNG TOTAL NOVEL
        $total_book = count($q_total_book);
        // JIKA TIPE NOVEL = 1 MAKA CARI STATUS YG 1
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
        // RATING NOVEL
        $novel_rate = DB::table('d_novel_rate')
                    ->join('d_mem','m_id','dr_rated_by')
                    ->where('dr_ref_id',$code->dn_id)
                    ->orderBy('dr_id','DESC')
                    ->get();
        //LOAD COMMENT NOVEL
        for ($i=0; $i <count($novel_rate) ; $i++) { 
            $novel_reply = DB::table('d_novel_rate_dt')
                    ->join('d_mem','m_id','drdt_reply_by')
                    ->where('drdt_ref_id',$code->dn_id)
                    // ->orWhere('drdt_ref_rate_id',$novel_rate[$i]->dr_id)
                    ->orderBy('drdt_id','ASC')
                    ->get();
        }
        //TOTAL SUBSRIBE
        $total_subscribe = DB::table('d_novel_subscribe')
                            ->where('dns_ref_id',$code->dn_id)
                            ->count();

        // TOTAL LIKE 
        $total_like = DB::table('d_novel_like')
                            ->where('dnl_ref_id',$code->dn_id)
                            ->count();

        $total_view = DB::table('d_novel_chapter')
                            ->where('dnch_ref_id',$code->dn_id)
                            ->sum('dnch_viewer');

        if (Auth::user() != null) {
            $subscriber = DB::table('d_novel_subscribe')
                            ->where('dns_subscribe_by',Auth::user()->m_id)
                            ->where('dns_ref_id',$code->dn_id)
                            ->count();

            $liker = DB::table('d_novel_like')
                            ->where('dnl_like_by',Auth::user()->m_id)
                            ->where('dnl_ref_id',$code->dn_id)
                            ->count();
        }
        // return response()->json([$novel_reply,$novel_rate]);
        $tags = DB::table('d_novel_tags')
                    ->where('dnt_ref_id',$code->dn_id)
                    ->get();

        // return response()->json(['chapter'=>$chapter,'book'=>$book,'tags'=>$tags,'code'=>$code,'novel'=>$novel]);
        return view('novel_frontend.detail_novel.detail_novel',compact('book','chapter','tags','novel','total_view','total_book','novel_rate','novel_reply','total_subscribe','subscriber','liker','total_like'));
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
