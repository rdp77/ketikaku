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
        $chapter = DB::table('d_novel_chapter')->join('users','users.id','=','d_novel_chapter.dnch_created_by')->join('d_novel','d_novel.dn_id','=','d_novel_chapter.dnch_ref_id')->where('dnch_title',$title)->first();
        $all_chapter = DB::table('d_novel_chapter')->where('dnch_ref_id',$chapter->dnch_ref_id)->get();
        // return response()->json(['chapter'=>$chapter,'title'=>$title,'all_chapter'=>$all_chapter]);
        return view('novel_frontend.detail_chapter.detail_chapter',compact('title','chapter','all_chapter'));
    }
}
