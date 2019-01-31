<?php

namespace App\Http\Controllers\backend\editor;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB; 
use Storage;
use App\d_mem;

class approve_chapterController extends Controller
{
    public function index()
    {
 
    	$data = DB::table('d_novel_chapter')
    						->select('dnch_id','dnch_title','dn_title','m_username','dnch_created_at','m_role')
    						->join('d_novel','dn_id','dnch_ref_id')
    						->join('d_mem','m_id','dnch_created_by')
                            ->where(function ($query) {
                                $query->where('dnch_status', '=', 1)
                                      ->orWhere('dnch_status', '=', 2);
                            })
                            // ->where('dnch_status',2)
    						->where('dn_type_novel',1)
    						->get();

    	return view('backend_view.approve_chapter.index',compact('data'));

    }
    public function edit($id)
    {
    	/*return */$data = DB::table('d_novel_chapter')
    						->select('dnch_id','dnch_title','dnch_content','dn_id','dn_title','m_username','dnch_created_at','m_role')
    						->join('d_novel','dn_id','dnch_ref_id')
    						->join('d_mem','m_id','dnch_created_by')
    						->where('dnch_id',$id)
    						->first();

    	return view('backend_view.approve_chapter.edit',compact('data'));
    }
    public function update(Request $req)
    {
         $data = DB::table('d_novel_chapter')
         				->where('dnch_ref_id',$req->dnch_ref_id)
         				->where('dnch_id',$req->dnch_id)
         				->update([
				            'dnch_title'=>$req->dnch_title,
				            'dnch_content'=>$req->dnch_content,
				            'dnch_updated_at'=>date('Y-m-d h:i:s'),
				            'dnch_approved_by'=>Auth::user()->m_id,
				            'dnch_status'=>1,
				        ]);

        //return response 
        if ($data == true) {
        	return response()->json(['status'=>'sukses']);
        }else{
        	return response()->json(['status'=>'gagal']);
        }
    }
}
