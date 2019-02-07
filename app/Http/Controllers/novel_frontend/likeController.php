<?php

namespace App\Http\Controllers\novel_frontend;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB; 
use Storage;
class likeController extends Controller
{
    public function like(Request $request)
    {
        // dd($request->all());
        $check_data = DB::table('d_novel_like')
                            ->where('dnl_ref_id',$request->id)
                            ->where('dnl_like_by',Auth::user()->m_id)
                            ->get();
        $check_hitung = count($check_data);

        if ($check_hitung < 1) {
            $insert =  DB::table('d_novel_like')
                        ->insert([
                            'dnl_ref_id'=>$request->id,
                            'dnl_creator'=>$request->creator,
                            'dnl_like_by'=>Auth::user()->m_id, 
                            'dnl_created_at'=>date('Y-m-d H:i:s')
                        ]);
            $check = 'plus';
        }else{
            $update =  DB::table('d_novel_like')
                        ->where('dnl_ref_id',$request->id)
                        ->where('dnl_like_by',Auth::user()->m_id)
                        ->delete();
            $check = 'minus';
        }
        $total_like = DB::table('d_novel_like')
                            ->where('dnl_ref_id',$request->id)
                            ->count();
        return response()->json(['status'=>'sukses','check'=>$check,'total_like'=>$total_like]);
        // return $insert;

    }
}
