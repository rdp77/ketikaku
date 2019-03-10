<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class d_mem extends Authenticatable
{
    protected $table = 'd_mem';
    protected $primaryKey = 'm_username';
    public $incrementing = false;
    public $remember_token = false;
    const CREATED_AT = 'm_created_at';
    const UPDATED_AT = 'm_updated_at';

    protected $fillable = ['m_id','m_name','m_email',
    					   'm_code','m_address','m_iamge',
    					   'm_tempat_lahir','m_kel','m_isactive',
    					   'm_role','m_token','m_username',
    					   'm_password', 'm_lastlogin', 'm_lastlogout',
    					   'm_instagram', 'm_gender', 'm_phone',
                           'm_follower', 'm_desc_full','m_twitter',
    					   'm_facebook', 'm_desc_short', 'm_youtube',
    					   'm_created_at', 'm_updated_at'];

}