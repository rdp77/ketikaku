<?php

namespace App\Http\Controllers\novel_frontend;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB; 
use Storage;
class subscribeController extends Controller
{
    public function subscribe(Request $request)
    {
        // dd($request->all());
        $check_data = DB::table('d_novel_subscribe')
                            ->where('dns_ref_id',$request->id)
                            ->where('dns_subscribe_by',Auth::user()->m_id)
                            ->get();
        $check_hitung = count($check_data);

        if ($check_hitung < 1) {
            $insert =  DB::table('d_novel_subscribe')
                        ->insert([
                            'dns_ref_id'=>$request->id,
                            'dns_creator'=>$request->creator,
                            'dns_subscribe_by'=>Auth::user()->m_id, 
                            'dns_created_at'=>date('Y-m-d H:i:s')
                        ]);
            $check = 'plus';
        }else{
            $update =  DB::table('d_novel_subscribe')
                        ->where('dns_ref_id',$request->id)
                        ->where('dns_subscribe_by',Auth::user()->m_id)
                        ->delete();
            $check = 'minus';
        }
        $total_subscribe = DB::table('d_novel_subscribe')
                            ->where('dns_ref_id',$request->id)
                            ->count();
        return response()->json(['status'=>'sukses','check'=>$check,'total_subscribe'=>$total_subscribe]);
        // return $insert;

    }
}
