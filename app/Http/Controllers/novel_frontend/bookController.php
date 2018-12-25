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
        
        $code = DB::table('d_novel')->where('dn_title',$title)->first();

        // return json_encode($code);



        $novel = DB::table('d_novel')->where('dn_created_by','=',$code->dn_created_by)->where('dn_title','!=',$title)->get();

        $book = DB::table('d_novel')->join('users','users.id','=','d_novel.dn_created_by')->where('dn_id',$code->dn_id)->first();

        $chapter = DB::table('d_novel_chapter')->where('dnch_ref_id',$code->dn_id)->get();
        
        $tags = DB::table('d_novel_tags')->where('dnt_ref_id',$code->dn_id)->get();
         // return response()->json(['chapter'=>$chapter,'book'=>$book,'tags'=>$tags,'code'=>$code,'novel'=>$novel]);
        return view('novel_frontend.detail_novel.detail_novel',compact('book','chapter','tags','novel'));
    }
}
