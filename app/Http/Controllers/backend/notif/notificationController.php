<?php

namespace App\Http\Controllers\backend\notif;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB; 
use Storage;
use App\d_mem;

class notificationController extends Controller
{
    public function notif_bell()
    {
    	$notif_subs = DB::table('d_novel_subscribe')
                    ->select('m_username as user','dns_created_at as upload_date','dn_title as tittles','m_image as image','dns_read as status')
                    ->selectRaw("'subs' as flag")
                    // ->select('"subs" as tipe')
                    ->join('d_novel','dns_ref_id','dn_id')
                    ->join('d_mem','dns_subscribe_by','m_id')
                    // ->where('dns_read','N')
                    ->where('dn_status','publish')
                    ->where('dns_subscribe_by',Auth::user()->m_id)
                    ->get()->toArray();
        $notif_follow = DB::table('d_mem_follow')
                    ->select('m_username as user','dmf_created_at as upload_date','m_image as image','dmf_read as status')
                    ->selectRaw("'follow' as flag")
                    // ->select('"subs" as tipe')
                    ->join('d_mem','dmf_follow_by','m_id')
                    // ->where('dmf_read','N')
                    ->where('dmf_followed',Auth::user()->m_id)
                    ->get()->toArray();

        $notif_upload_novel = DB::table('d_novel_notif')
                    ->select('m_username as user','dnn_created_at as upload_date','dn_title as tittles','dn_cover as image','dnn_read as status')
                    // ->select('"upload" as tipe')
                    ->selectRaw("'upload' as flag")
                    ->join('d_novel','dnn_novel','dn_id')
                    ->join('d_mem','dnn_subscriber','m_id')
                    ->where('dn_status','publish')
                    // ->where('dnn_read','N')
                    ->where('dnn_subscriber',Auth::user()->m_id)
                    ->get()->toArray();
        $notif_upload_chapter = DB::table('d_novel_notif_chapter')
                    ->select('m_username as user','dnnc_created_at as upload_date','dn_title as tittles','dn_cover as image','dnch_status as status')
                    ->selectRaw("'update' as flag")
                    ->join('d_novel','dnnc_novel','dn_id')
                    ->join('d_novel_chapter','dnch_ref_id','dn_id')
                    ->join('d_mem','dnnc_creator','m_id')
                    ->where('dnch_status','publish')
                    // ->where('dnnc_read','N')
                    ->where('dnnc_subscriber',Auth::user()->m_id)
                    ->get()->toArray();
        $data = [];
        $data = array_merge($notif_subs,$notif_upload_novel,$notif_upload_chapter,$notif_follow);


        $check_notif = count($data);
        if ($check_notif > 0 ) {
            return response()->json([

                                    'notif'=>$data,
                                    'status'=>'sukses',
                                    'header'=>$check_notif.'  &nbsp;'.' Notification'

                                ]);
        }else{
            return response()->json([
                                    
                                    'notif'=>'Anda Tidak Memiliki notifikasi Terbaru',
                                    'status'=>'kosong',                                    
                                    'header'=>'No Notification'                                    
                                
                                ]);
        }
    }
    public function sum_notif_bell()
    {
        $notif_subs = DB::table('d_novel_subscribe')
                    ->select('m_username as user','dns_created_at as upload_date','dn_title as tittles','m_image as image','dns_read as status')
                    ->selectRaw("'subs' as flag")
                    // ->select('"subs" as tipe')
                    ->join('d_novel','dns_ref_id','dn_id')
                    ->join('d_mem','dns_subscribe_by','m_id')
                    ->where('dns_read','N')
                    ->where('dn_status','publish')
                    ->where('dns_subscribe_by',Auth::user()->m_id)
                    ->get()->toArray();
        $notif_follow = DB::table('d_mem_follow')
                    ->select('m_username as user','dmf_created_at as upload_date','m_image as image','dmf_read as status')
                    ->selectRaw("'follow' as flag")
                    // ->select('"subs" as tipe')
                    ->join('d_mem','dmf_follow_by','m_id')
                    ->where('dmf_read','N')
                    ->where('dmf_followed',Auth::user()->m_id)
                    ->get()->toArray();

        $notif_upload_novel = DB::table('d_novel_notif')
                    ->select('m_username as user','dnn_created_at as upload_date','dn_title as tittles','dn_cover as image','dnn_read as status')
                    // ->select('"upload" as tipe')
                    ->selectRaw("'upload' as flag")
                    ->join('d_novel','dnn_novel','dn_id')
                    ->join('d_mem','dnn_subscriber','m_id')
                    ->where('dn_status','publish')
                    ->where('dnn_read','N')
                    ->where('dnn_subscriber',Auth::user()->m_id)
                    ->get()->toArray();
        $notif_upload_chapter = DB::table('d_novel_notif_chapter')
                    ->select('m_username as user','dnnc_created_at as upload_date','dn_title as tittles','dn_cover as image','dnch_status as status')
                    ->selectRaw("'update' as flag")
                    ->join('d_novel','dnnc_novel','dn_id')
                    ->join('d_novel_chapter','dnch_ref_id','dn_id')
                    ->join('d_mem','dnnc_creator','m_id')
                    ->where('dnch_status','publish')
                    ->where('dnnc_read','N')
                    ->where('dnnc_subscriber',Auth::user()->m_id)
                    ->get()->toArray(); 
        $data = [];
        $data = array_merge($notif_subs,$notif_upload_novel,$notif_upload_chapter,$notif_follow);


        $check_notif = count($data);
        return response()->json([
            'status'=>'sukses',
            'total'=>$check_notif
        ]);
    }
    public function notif_like()
    {
        $notif = DB::table('d_novel_like')
                    ->select('m_username','dnl_created_at','dn_title','m_image')
                    ->join('d_novel','dnl_ref_id','dn_id')
                    ->join('d_mem','dnl_like_by','m_id')
                    ->where('dnl_read','N')
                    ->where('dnl_creator',Auth::user()->m_id)
                    ->limit(5)
                    ->get();

        $check_notif = count($notif);
        if ($check_notif > 0 ) {
            return response()->json([

                                    'notif'=>$notif,
                                    'status'=>'sukses',
                                    'header'=>$check_notif.'  &nbsp;'.' Notification'

                                ]);
        }else{
            return response()->json([
                                    
                                    'notif'=>'Anda Tidak Memiliki notifikasi Terbaru',
                                    'status'=>'kosong',                                    
                                    'header'=>'No Notification'                                    
                                
                                ]);
        }
    }
    public function notif_read(Request $req)
    {

        $notif_subs = DB::table('d_novel_subscribe')
                    ->where('dns_subscribe_by',Auth::user()->m_id)
                    ->update(['dns_read'=>'Y']);
        $notif_follow = DB::table('d_mem_follow')
                    ->where('dmf_followed',Auth::user()->m_id)
                    ->update(['dmf_read'=>'Y']);
        $notif_upload_novel = DB::table('d_novel_notif')
                    ->where('dnn_subscriber',Auth::user()->m_id)
                    ->update(['dnn_read'=>'Y']);

        $notif_upload_chapter = DB::table('d_novel_notif_chapter')
                    ->where('dnnc_subscriber',Auth::user()->m_id)
                    ->update(['dnnc_read'=>'Y']);
        
    }
    public function notif_more()
    {
        $notif_subs = DB::table('d_novel_subscribe')
                    ->select('m_username as user','dns_created_at as upload_date','dn_title as tittles','m_image as image','dns_read as status')
                    ->selectRaw("'subs' as flag")
                    // ->select('"subs" as tipe')
                    ->join('d_novel','dns_ref_id','dn_id')
                    ->join('d_mem','dns_subscribe_by','m_id')
                    // ->where('dns_read','N')
                    ->where('dn_status','publish')
                    ->where('dns_subscribe_by',Auth::user()->m_id)
                    ->get()->toArray();
        $notif_follow = DB::table('d_mem_follow')
                    ->select('m_username as user','dmf_created_at as upload_date','m_image as image','dmf_read as status')
                    ->selectRaw("'follow' as flag")
                    // ->select('"subs" as tipe')
                    ->join('d_mem','dmf_follow_by','m_id')
                    // ->where('dmf_read','N')
                    ->where('dmf_followed',Auth::user()->m_id)
                    ->get()->toArray();

        $notif_upload_novel = DB::table('d_novel_notif')
                    ->select('m_username as user','dnn_created_at as upload_date','dn_title as tittles','dn_cover as image','dnn_read as status')
                    // ->select('"upload" as tipe')
                    ->selectRaw("'upload' as flag")
                    ->join('d_novel','dnn_novel','dn_id')
                    ->join('d_mem','dnn_subscriber','m_id')
                    ->where('dn_status','publish')
                    // ->where('dnn_read','N')
                    ->where('dnn_subscriber',Auth::user()->m_id)
                    ->get()->toArray();
        $notif_upload_chapter = DB::table('d_novel_notif_chapter')
                    ->select('m_username as user','dnnc_created_at as upload_date','dnch_title as tittles_chapter','dn_title as tittles','dn_cover as image','dnch_status as status')
                    ->selectRaw("'update' as flag")
                    ->join('d_novel','dnnc_novel','dn_id')
                    ->join('d_novel_chapter','dnch_ref_id','dn_id')
                    ->join('d_mem','dnnc_creator','m_id')
                    ->where('dnch_status','publish')
                    // ->where('dnnc_read','N')
                    ->where('dnnc_subscriber',Auth::user()->m_id)
                    ->get()->toArray(); 
        $data = [];
        // $data = array_merge($notif_subs,$notif_upload_novel,$notif_upload_chapter,$notif_follow);
        return view('backend_view.notification.notif_detail',compact('notif_subs','notif_upload_chapter','notif_upload_novel','notif_follow'));

    }
   
}
