<?php

namespace App\Http\Controllers\frontend\profile;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB; 
use Storage;
use App\d_mem;
class profileController extends Controller
{
    public function profile($name)
    {  
    	$profile = d_mem::where('m_username',$name)->first();
    	$following = DB::table('d_mem_follow')
    							->where('dmf_follow_by',$profile->m_id)
    							->count();
        $novels = DB::table('d_novel')
                    ->where('dn_created_by',$profile->m_id)
                    ->get();
        $data =  DB::Table('d_novel')->select('d_novel.*','d_mem.*',
                                            DB::raw("(SELECT COUNT(d_novel_like.dnl_ref_id) FROM d_novel_like
                                                WHERE d_novel_like.dnl_ref_id = d_novel.dn_id
                                                GROUP BY d_novel_like.dnl_ref_id) as liked"),
                                            DB::raw("(SELECT COUNT(d_novel_subscribe.dns_creator) FROM d_novel_subscribe
                                                WHERE d_novel_subscribe.dns_creator = d_mem.m_id
                                                GROUP BY d_novel_subscribe.dns_creator) as subscribed"),
                                            DB::raw("(SELECT SUM(d_novel_chapter.dnch_viewer) FROM d_novel_chapter
                                                WHERE d_novel_chapter.dnch_ref_id = d_novel.dn_id
                                                GROUP BY d_novel_chapter.dnch_ref_id) as viewer")
                                    )
                                    ->join('d_mem','m_id','dn_created_by')
                                    ->where('dn_created_by',$profile->m_id)
                                    ->get();


        return view('frontend_view.writer_profile.detail_profile',compact('profile','following','data','novels'));
    }
    public function follow(Request $request)
    {

    	$check_follow = DB::table('d_mem_follow')
    							->where('dmf_followed',$request->dmf_followed)
    							->where('dmf_follow_by',$request->dmf_follow_by)
    							->count();
    	$check_follow_mem = DB::table('d_mem')
    							->where('m_id',$request->dmf_followed)
    							->first();

    	// return response()->json($check_follow);
    	if ($check_follow < 1) {
    		$follow = DB::table('d_mem_follow')
    							->insert([
    								'dmf_followed'=>$request->dmf_followed,
    								'dmf_follow_by'=>$request->dmf_follow_by,
    								'dmf_created_at'=>date('Y-m-d h:i:s')
    							]);

    		$follow_up = DB::table('d_mem')
    							->where('m_id',$request->dmf_followed)
    							->update(['m_follower'=>$check_follow_mem->m_follower+1]);
    		$check = 'plus';
    	}else{
    		$follow = DB::table('d_mem_follow')
    							->where('dmf_followed',$request->dmf_followed)
    							->where('dmf_follow_by',$request->dmf_follow_by)
    							->delete();

    		$follow_up = DB::table('d_mem')
    							->where('m_id',$request->dmf_followed)
    							->update(['m_follower'=>$check_follow_mem->m_follower-1]);
    		$check = 'minus';
    	}

    	$total_follow = DB::table('d_mem_follow')
    							->where('dmf_followed',$request->dmf_followed)
    							->count();
    	

    	// if ($follow == true) {
	    return response()->json(['status'=>'sukses','check'=>$check,'follow'=>$total_follow]);
    	// }


    }
}
