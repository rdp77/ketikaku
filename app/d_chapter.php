<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class d_chapter extends Model
{
   protected $table = 'd_chapter';
   protected $primaryKey = 'dnch_id';
   const CREATED_AT = 'dnch_created_at';
   const UPDATED_AT = 'dnch_updated_at';

   protected $fillable = ['dnch_id','dnch_ref_id','dnch_title','dnch_content_at','dnch_created_by','dnch_updated_at'];
}

    