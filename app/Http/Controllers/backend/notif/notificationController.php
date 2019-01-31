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
    	$notif = DB::table('d_novel_subscribe')
                    ->select('m_username','dns_created_at','dn_title')
                    ->join('d_novel','dns_ref_id','dn_id')
                    ->join('d_mem','dns_subscribe_by','m_id')
                    ->where('dns_read','N')
                    ->where('dns_creator',Auth::user()->m_id)
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
   
}
