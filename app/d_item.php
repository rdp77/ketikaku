<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class d_item extends Model
{
   protected $table = 'm_item';
   protected $primaryKey = 'i_id';
   const CREATED_AT = 'i_created_at';
   const UPDATED_AT = 'i_updated_at';

   protected $fillable = ['i_id','i_code','i_name','i_kategori','i_sub_kategori','i_satuan_1','i_satuan_2','i_satuan_3','i_price_1','i_price_2','i_price_3','i_pricecab_1','i_pricecab_2','i_pricecab_3','i_pricepartai_1','i_pricepartai_2','i_pricepartai_3','i_created_at','i_updated_at'];
}

    