<?php

namespace App\Http\Controllers\backend\editor;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB; 
use Storage;
use App\d_mem;

class approve_novelController extends Controller
{
    public function index()
    {
 
    	$data = DB::table('d_novel')
    						->select('dn_title','m_id','m_username','dn_created_at','m_role','dn_id','dn_type_novel')
    						->join('d_mem','m_id','dn_created_by')
                            ->where('dn_type_novel',2)
    						->where('dn_status','publish')
    						->get();

    	return view('backend_view.approve_novel.index',compact('data'));

    }
    public function edit($id)
    {
 
    	$data = DB::table('d_novel')
    						->join('d_mem','m_id','dn_created_by')
    						->where('dn_type_novel',2)
                            ->where('dn_status','publish')
    						->where('dn_id',$id)
    						->first();

    	return view('backend_view.approve_novel.edit',compact('data'));

    }
    public function update(Request $req)
    {
    	$update = DB::table('d_novel')
    				->update([
    					'dn_title'=>$req->dn_title,
		                'dn_description'=>$req->dn_description,
                		'dn_updated_at'=>date('Y-m-d h:i:s'),
						'dn_approve_by'=>Auth::user()->m_id,
    					'dn_status'=>1
    				]);
    	return Response()->json(['status'=>'sukses']);

    }
    public function official(Request $request,$id)
    {
        // dd($id);
        $update = DB::table('d_novel')->where('dn_id',$id)
                        ->update([
                            'dn_type_novel'=>1
                        ]);

        return Response()->json(['status'=>'sukses']);
    }
}
