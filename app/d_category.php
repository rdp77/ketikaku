<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class d_category extends Model
{
   protected $table = 'm_category';
   protected $primaryKey = 'mc_id';
   const CREATED_AT = 'mc_created_at';
   const UPDATED_AT = 'mc_updated_at';

   protected $fillable = ['mc_id','mc_name'.'mc_color','mc_bgcolor','mc_created_at','mc_updated_at'];
}

    