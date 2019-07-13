<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class welcomeController extends Controller
{
    public function apis($n=5)
    {
/*        if ($n==1) {
            return 1;
        } else {
            return $n * $this->apis($n-1);
        }*/
        echo "//quick sortn";

    }
    public function perkalian($y=5)
    {
        if ($y==1) {
            return 1;
        }else{
            return $y+$this->perkalian($y-1);
        }
    }
    public function pengurangan($y=5)
    {
        if ($y==1) {
            return 1;
        }else{
            return $y-$this->pengurangan($y-1);
        }
    }
    public function pembagian($y=5)
    {
        if ($y==1) {
            return 1;
        }else{
            return $y/$this->pembagian($y-1);
        }
    }



    public function api(){


        $data_official = DB::table('d_novel')->select('d_novel.*','d_mem.*',
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
                                        ->where('dn_type_novel',1)
                                        ->join('d_mem','m_id','=','dn_created_by')
                                        ->orderBy('dn_id','DESC')->limit(8)->get();
        return response()->json($data_official);
    }
    public function api_detail($id)
    {
        $data_official = DB::table('d_novel')->select('d_novel.*',
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
                                        ->where('dn_id',$id)
                                        ->where('dn_type_novel',1)
                                        ->orderBy('dn_id','DESC')
                                        ->get();
        return response()->json($data_official);
    }
    public function data_all()
    {
        $data_official = DB::table('d_novel')->select('d_novel.*',
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
                                        ->where('dn_type_novel',1)
                                        ->orderBy('dn_id','DESC')->limit(8)->get();
        $data_latest = DB::table('d_novel')->select('d_novel.*',
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
        								->where('dn_type_novel',2)
                                        ->orderBy('dn_id','DESC')->limit(8)->get();
        $data_popular = DB::table('d_novel')
        								->select('d_novel.*',
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
                                        ->where('dn_type_novel',2)
                                        ->limit(8)
        								->get();
        $data_like = DB::table('d_novel')->select('d_novel.*',
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
        $category_list = DB::table('m_category')->get();
        return view('welcome',compact('data_latest','data_popular','data_like','review','popular_writter','data_official','category_list'));
    }
    public function comment_ajax()
    {
    	
    }
    public function tnc()
    {
        return view('frontend_view.tnc.tnc');
    }
    public function search_user(Request $req)
    {
        // return 'a';
        $ss = $req->search;
        // $search_user = DB::select("SELECT * FROM d_mem WHERE m_username like '%$req->search%' OR m_name like '%$req->search%' limit 20");
        $search_user = DB::table('d_mem')
                                        ->select('d_mem.m_id','d_mem.m_username','d_mem.m_image','d_mem.m_desc_short',
                                                        DB::raw("(SELECT COUNT(d_novel_subscribe.dns_creator) FROM d_novel_subscribe
                                                            WHERE d_novel_subscribe.dns_creator = d_mem.m_id
                                                            GROUP BY d_novel_subscribe.dns_creator) as subscriber"))
                                        ->limit(7)
                                        ->where('m_username','like',"%$req->search%")
                                        ->orderByRaw('subscriber DESC')
                                        ->get();  
        
        $search_story = DB::table('d_novel')->select('d_novel.*',
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
                                        ->where(function ($query) use ($req) {
                                            $query->Where('dn_title','like',"%$req->search%")
                                                  ->orWhere('dn_description','like',"%$req->search%");
                                        })
                                        ->orderBy('dn_id','DESC')->limit(8)->get();
        // return response()->json(['status'=>'sukses','user'=>$search_user,'story'=>$search_story]);
        return view('frontend_view.search.search',compact('search_user','search_story','ss'));
    }
    public function list_category_story()
    {
        $category_list = DB::table('m_category')
                                ->select('m_category.mc_id','m_category.mc_name',
                                DB::raw("(SELECT COUNT(d_novel.dn_category) FROM d_novel
                                                WHERE d_novel.dn_category = m_category.mc_id
                                                GROUP BY d_novel.dn_category) as total"))
                                ->orderBy('total','DESC')->limit(5)->get();
        return response()->json(['list'=>$category_list]);
    }
    public function search_category($id)
    {
        $ss = DB::table('m_category')->select('mc_name')->where('mc_id',$id)->first();

        /*return*/ $search_story = DB::table('d_novel')->select('d_novel.*',
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
                                        ->where('dn_category',$id)
                                        ->orderBy('dn_id','DESC')->get();

        return view('frontend_view.search.search_category',compact('search_story','ss'));
        
    }

}
