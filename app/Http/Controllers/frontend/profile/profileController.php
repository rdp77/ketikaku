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
                    ->count();
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
        if (Auth::user() != null) {
            $follow = DB::table('d_mem_follow')
                            ->where('dmf_follow_by',Auth::user()->m_id)
                            ->where('dmf_followed',$profile->m_id)
                            ->count();
        }
        $n = 1120000;
        $precision = 1;

        if ($n < 900) {
        // 0 - 900
        $n_format = number_format($n, $precision);
        $suffix = '';
        } else if ($n < 900000) {
            // 0.9k-850k
            $n_format = number_format($n / 1000, $precision);
            $suffix = 'K';
        } else if ($n < 900000000) {
            // 0.9m-850m
            $n_format = number_format($n / 1000000, $precision);
            $suffix = 'M';
        } else if ($n < 900000000000) {
            // 0.9b-850b
            $n_format = number_format($n / 1000000000, $precision);
            $suffix = 'B';
        } else {
            // 0.9t+
            $n_format = number_format($n / 1000000000000, $precision);
            $suffix = 'T';
        }
      // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
      // Intentionally does not affect partials, eg "1.50" -> "1.50"
        if ( $precision > 0 ) {
            $dotzero = '.' . str_repeat( '0', $precision );
            $n_format = str_replace( $dotzero, '', $n_format );
        }
        // return $n_format . $suffix;


        return view('frontend_view.writer_profile.detail_profile',compact('profile','following','data','novels','follow'));
    }
    public function FunctionName($value='')
    {
        # code...
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
    public function following(Request $request)
    {
        $followed = DB::table('d_mem_follow')
                                ->select('d_mem_follow.*','d_mem.*',
                                            DB::raw("(SELECT COUNT(d_novel.dn_created_by) FROM d_novel
                                                WHERE d_mem.m_id = d_novel.dn_created_by
                                                GROUP BY d_novel.dn_created_by) as novel"),
                                            DB::raw("(SELECT COUNT(d_mem_follow.dmf_followed) FROM d_mem_follow
                                                WHERE d_mem.m_id = d_mem_follow.dmf_followed
                                                GROUP BY d_mem_follow.dmf_followed) as followers"),
                                            DB::raw("(SELECT COUNT(d_mem_follow.dmf_follow_by) FROM d_mem_follow
                                                WHERE d_mem.m_id = d_mem_follow.dmf_follow_by
                                                GROUP BY d_mem_follow.dmf_follow_by) as following")
                                )
                                ->join('d_mem','dmf_followed','m_id')
                                ->where('dmf_follow_by',$request->id)
                                ->get();

        return view('frontend_view.writer_profile.detail_profile_following',compact('followed'));
    }
}
