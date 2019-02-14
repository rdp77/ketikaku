<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class welcomeController extends Controller
{
    public function data_all()
    {
        $data_official = DB::table('d_novel')->select('d_novel.*',
                                            DB::raw("(SELECT COUNT(d_novel_like.dnl_ref_id) FROM d_novel_like
                                                WHERE d_novel_like.dnl_ref_id = d_novel.dn_id
                                                GROUP BY d_novel_like.dnl_ref_id) as liked"))
                                        ->where('dn_status','publish')
                                        ->where('dn_type_novel',1)
                                        ->orderBy('dn_id','DESC')->limit(8)->get();
        $data_latest = DB::table('d_novel')->select('d_novel.*',
        									DB::raw("(SELECT COUNT(d_novel_like.dnl_ref_id) FROM d_novel_like
                                				WHERE d_novel_like.dnl_ref_id = d_novel.dn_id
                                				GROUP BY d_novel_like.dnl_ref_id) as liked"))
                                        ->where('dn_status','publish')
        								->where('dn_type_novel',2)
                                        ->orderBy('dn_id','DESC')->limit(8)->get();
        $data_popular = DB::table('d_novel')
        								->select('d_novel.*',
        									DB::raw("(SELECT COUNT(d_novel_like.dnl_ref_id) FROM d_novel_like
                                				WHERE d_novel_like.dnl_ref_id = d_novel.dn_id
                                				GROUP BY d_novel_like.dnl_ref_id) as liked"))
        								->where('dn_status','publish')
                                        ->where('dn_type_novel',2)
                                        ->limit(8)
        								->get();
        $data_like = DB::table('d_novel')->select('d_novel.*',
        									DB::raw("(SELECT COUNT(d_novel_like.dnl_ref_id) FROM d_novel_like
                                				WHERE d_novel_like.dnl_ref_id = d_novel.dn_id
                                				GROUP BY d_novel_like.dnl_ref_id) as liked"))
        								->where('dn_status','publish')
                                        ->where('dn_type_novel',2)
                                        ->limit(8)
                                        ->orderByRaw('liked DESC')
        								->get();
        $review = DB::table('d_novel_rate')
                                        ->join('d_mem','m_id','dr_rated_by')
                                        ->orderBy('dr_created_at','DESC')
                                        ->limit(7)
                                        ->get();
        $popular_writter = DB::table('d_mem')
                                        ->select('d_mem.m_id','d_mem.m_username','d_mem.m_image','d_mem.m_desc_short',
                                                        DB::raw("(SELECT COUNT(d_novel_subscribe.dns_creator) FROM d_novel_subscribe
                                                            WHERE d_novel_subscribe.dns_creator = d_mem.m_id
                                                            GROUP BY d_novel_subscribe.dns_creator) as subscriber"))
                                        ->limit(7)
                                        ->orderByRaw('subscriber DESC')
                                        ->get();    
        return view('welcome',compact('data_latest','data_popular','data_like','review','popular_writter','data_official'));
    }
    public function comment_ajax()
    {
    	
    }
}
