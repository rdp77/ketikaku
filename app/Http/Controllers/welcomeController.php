<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class welcomeController extends Controller
{
    public function data_all()
    {
        $data_latest = DB::table('d_novel')->select('d_novel.*',
        									DB::raw("(SELECT COUNT(d_novel_like.dnl_ref_id) FROM d_novel_like
                                				WHERE d_novel_like.dnl_ref_id = d_novel.dn_id
                                				GROUP BY d_novel_like.dnl_ref_id) as liked"))
        								->where('dn_status','publish')
                                        ->orderBy('dn_id','DESC')->limit(8)->get();
        $data_popular = DB::table('d_novel')
        								->select('d_novel.*',
        									DB::raw("(SELECT COUNT(d_novel_like.dnl_ref_id) FROM d_novel_like
                                				WHERE d_novel_like.dnl_ref_id = d_novel.dn_id
                                				GROUP BY d_novel_like.dnl_ref_id) as liked"))
        								->where('dn_status','publish')
                                        ->limit(8)
        								->get();
        $data_like = DB::table('d_novel')->select('d_novel.*',
        									DB::raw("(SELECT COUNT(d_novel_like.dnl_ref_id) FROM d_novel_like
                                				WHERE d_novel_like.dnl_ref_id = d_novel.dn_id
                                				GROUP BY d_novel_like.dnl_ref_id) as liked"))
        								->where('dn_status','publish')
                                        ->limit(8)
        								->get();

        $review = DB::table('d_novel')->get();
        $review = DB::table('d_novel_rate')
                    ->join('d_mem','m_id','dr_rated_by')
                    ->orderBy('dr_created_at','DESC')
                    ->limit(7)
                    ->get();
        return view('welcome',compact('data_latest','data_popular','data_like','review'));
    }
    public function comment_ajax()
    {
    	
    }
}
