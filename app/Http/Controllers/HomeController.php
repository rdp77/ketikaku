<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment_chapter = DB::table('d_novel_chapter_comment')
                                    ->leftjoin('d_novel','dn_id','dncc_ref_id')
                                    ->leftjoin('d_mem','m_id','dncc_comment_by')
                                    ->where('dncc_creator',Auth::user()->m_id)
                                    ->orderBy('dncc_id','DESC')
                                    ->get();
        $rating_novel = DB::table('d_novel_rate')
                                    ->leftjoin('d_novel','dn_id','dr_ref_id')
                                    ->leftjoin('d_mem','m_id','dr_rated_by')
                                    ->where('dn_created_by',Auth::user()->m_id)
                                    ->orderBy('dr_id','DESC')
                                    ->get();
        return view('home',compact('comment_chapter','rating_novel'));
    }
     

}
