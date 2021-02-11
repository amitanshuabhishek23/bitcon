<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreDeleteList extends Model
{
    use HasFactory;
     /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = "store_delete_lists";

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'store_id','shop_id','email','phone','install_date','store_url','store_name','country_name','created_at','updated_at'
    ];
}
