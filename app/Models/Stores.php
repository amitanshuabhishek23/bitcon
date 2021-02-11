<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    use HasFactory;
    
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = "stores";

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'store_url','shop_id','shop_owner','store_name','money_in_emails_format','money_with_currency_in_emails_format','province','access_token','email','country_name','customer_email','currency','minimum_qty','address','phone','city','zip','reference_url','iana_timezone','status','created_at','updated_at'
    ];

     /*
    * The function use for get store by id
    */
    public function getStore($columns="*",$whereFilter=false)
    {
        $result = Stores::select($columns)
        ->where(function ($query) use ($whereFilter){
            if(!empty($whereFilter)){
                $query->where($whereFilter);
            }
        })
        ->first();
        return $result;
    }
}
