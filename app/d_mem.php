<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Auth;
class d_mem extends Authenticatable
{
    protected $table = 'd_mem';
    protected $primaryKey = 'm_username';
    public $incrementing = false;
    public $remember_token = false;
    const CREATED_AT = 'm_created_at';
    const UPDATED_AT = 'm_updated_at';

    protected $fillable = ['m_id','m_code','m_username','m_password','m_name','m_email','m_birth_date','m_address','m_img','m_lastlogin','m_lastlogout','m_created_at','m_updated_at','m_birth_place', 'm_gender', 'm_status', 'm_site', 'm_unit', 'm_access'];


    public function akses($fitur,$aksi){
          $cek = DB::table('d_mem')
            ->join('d_role_menu', 'role_id', '=', 'm_access')
            ->where('menu_id', '=', $fitur)
            ->where($aksi, '=', 'aktif') 
            ->where('m_id', '=', Auth::user()->m_id)             
            ->get();
          // return $cek;
        
        if(count($cek) != 0)
            return true;
            // return 'aktif';
        else
            return false;
            // return 'b';
    }
    

}