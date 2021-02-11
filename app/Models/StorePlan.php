<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Load models
use App\Models\PricePlans;

class StorePlan extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = "store_plans";

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'store_id','plan_id','recurring_application_charge_id','api_client_id','price','status',
        'confirmation_url','billing_on','created_on','activated_on','cancelled_on','trial_days',
        'trial_ends_on','decorated_return_url','created_at','updated_at',
    ];

    /*
    * Relation with store product table
    */
    public function activated_plan()
    {
        return $this->hasOne(PricePlans::class,'id','plan_id');
    }

     /*
    * The function use for get all data
    */
    public function getActivePlan($columns="*",$whereFilter=false)
    {
        $result = StorePlan::select($columns)
        ->where(function ($query) use ($whereFilter){
            if(!empty($whereFilter)){
                $query->where($whereFilter);
            }
        })
        ->with([
            'activated_plan' => function($query){
                $query->select('*');
            }
        ])
        ->get()
        ->all();
        return $result;
    }
}
