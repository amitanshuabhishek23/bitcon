<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Models\StoreProduct;
use App\Models\Stores;
use App\Models\AppPublishTheme;
use Illuminate\Support\Facades\Crypt;

class AppDefaultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
    }
    public function shop_data_erasure(request $request)
    {
      //$webhook_payload=file_get_contents('php://input');
      //$webhook_payload=json_decode($webhook_payload,true);
      $webhook_payload = $request->all();
      $shop_domain=@$webhook_payload['shop_domain'];
      $shop_id=@$webhook_payload['shop_id'];
      if($shop_id)
      {
        $shopInfo = Stores::where("shop_id",$shop_id)->first();
        if($shopInfo)
        {    
            $email=$shopInfo->email;
            $shop_owner=$shopInfo->shop_owner;
            $postShop=array(
            "store_id"=>$shopInfo->id,
            "email"=>$shopInfo->email,
            "shop_owner"=>$shopInfo->shop_owner,
            "phone"=>$shopInfo->phone,
            "install_date"=>$shopInfo->created_at,
            "country_name"=>$shopInfo->country_name,
            "store_url"=>$shopInfo->store_url,
            "store_name"=>$shopInfo->store_name,
            "created_at"=>datetimest(),
            "updated_at"=>datetimest());
            $store_products_id=DB::table('store_delete_lists')->insertGetId($postShop);

            if($store_products_id)
            { 
              $itemDelete =Stores::where("shop_id",$shop_id)->delete();
              if($itemDelete){
                /// for customer 
                 $supportUnstallData = [
                    'name'      => $shop_owner,
                    'shop'      => $shop_domain,
                    'app_name'      => getenv('APP_NAME'),
                    'support_email'      => getenv('MAIL_FROM_ADDRESS'),
                    'email'     => $email,
                    'subject'   => "You have uninstalled our ".getenv('APP_NAME')." app",
                ];
                sendEmail('app-uninstall',$supportUnstallData['email'],[
                    'subject'       => $supportUnstallData['subject'],
                    'user_detail'   => ($supportUnstallData)?$supportUnstallData:array(),
                ]);

                /// for support 
                $mailTo="lalutale@bitcot.com";
                $thankData = [
                    'name'      => "Support",
                    'shop'      => $shop_domain,
                    'email'     => $email,
                    'subject'   => getenv('APP_NAME').": app Uninstall",
                ];
                sendEmail('app-install-support-info',$mailTo,[
                    'subject'       => $thankData['subject'],
                    'user_detail'   => ($thankData)?$thankData:array(),
                ]);
                
                $mailTo=getenv('MAIL_FROM_ADDRESS');
                sendEmail('app-install-support-info',$mailTo,[
                    'subject'       => $thankData['subject'],
                    'user_detail'   => ($thankData)?$thankData:array(),
                ]);
                
                 return response()->json(['status' =>false, 'message' =>'successfully delete Shop all information from database','data' =>""]);
              }else{       
                 return response()->json(['status' =>false, 'message' =>'there are no more information.data already deleted','data' =>""]); 
              }
              
            } else
            {
             $resp=array("status"=>"false","message"=>"missing requirment parameters");
            }
        }

        return response()->json(['status' =>true, 'message' =>'shop data erasure','data' =>""]);  
      } else
      {
        return response()->json(['status' =>false, 'message' =>'Data not found','data'=>[]]);
      } 
    }

    public function appCodeCleanUp($id=0)
    {
        $storeId     = $id;
        $storesModel = Stores::find($storeId);
        if(empty($storesModel))
        {
            return response()->json(['status' => false, 'message' => "Invalid store id {$storeId}."]);
        }

        /* theme code remove app install time  */

        $store_id=$storeId;
        $themeInfo = AppPublishTheme::where("store_id",$store_id)->first();
        if($themeInfo)
        {
            $bc_theme_id=$themeInfo->theme_id;
            $scriptTags=shopify_call($store_id, '/admin/themes/'.$bc_theme_id.'/assets.json?asset[key]=layout/theme.liquid&theme_id='.$bc_theme_id,array(), 'GET');

            $res=json_decode($scriptTags['response']);
            if(!empty(@$res->asset->value))
            {
                $themeLiquid=$res->asset->value;
                $themeLiquid=str_replace("{% include 'product_pinch_zoom' %}","", $themeLiquid);
                // theme.liquid updated
                $theme_array = array(
                    "asset"        => array(
                    "content_type" => "text/html",
                    "key"          => "layout/theme.liquid",
                    "theme_id"     => $bc_theme_id,
                    "value"        => $themeLiquid
                )
                );

                shopify_call($store_id, '/admin/themes/'.$bc_theme_id.'/assets.json', $theme_array, 'PUT');

                $snippets_array = array("asset" => array("content_type" => "text/html",
                "key" => "snippets/product_pinch_zoom.liquid",
                "theme_id"=>$bc_theme_id));

                $ResponseSp=shopify_call($store_id, '/admin/themes/'.$bc_theme_id.'/assets.json', $snippets_array, 'DELETE');
                if($ResponseSp){
                    return response()->json(['status' =>true, 'message' =>'Theme code clean up','data' =>""]);
                }else{
                    return response()->json(['status' =>false, 'message' =>'Data not found','data'=>[]]);
                }    
            }
            else
            {
                return response()->json(['status' =>false, 'message' =>'Data not found','data'=>[]]);
            }
          
        }else
        {
            return response()->json(['status' =>false, 'message' =>'Data not found','data'=>[]]);

        }
       
    }

     public function appStatusReview($id=0)
    {
        $storeId     = $id;
        $storesModel = Stores::find($storeId);
        if(empty($storesModel))
        {
            return response()->json(['status' => false, 'message' => "Invalid store id {$storeId}."]);
        }

        /* theme code remove app install time  */

        $store_id=$storeId;
        $dt = date("Y-m-d");
        $lastWeekDate=date( "Y-m-d", strtotime( "$dt -7 days" ) );

        $themeInfo = AppPublishTheme::where("store_id",$store_id)->where('created_at', '<',$lastWeekDate)->where('status_front',1)->first();
        if($themeInfo)
        {
            return response()->json(['status' =>true, 'message' =>'you are ready for review','data' =>""]);
        }else
        {
            return response()->json(['status' =>false, 'message' =>'Data not found','data'=>[]]);

        }
       
    }

    public function customer_data_request(request $request)
    {  
    $data = $request->all();
    if($data)
    {
      return response()->json(['status' =>true, 'message' =>'customer data request','data' =>""]);  
    }else{
      return response()->json(['status' =>false, 'message' =>'Data not found','data'=>[]]);
    } 
    }

    public function customer_data_erasure(request $request)
    { 
    $data = $request->all();
    if($data)
    {
      return response()->json(['status' =>true, 'message' =>'customer data erasure','data' =>""]);  
    }else{
      return response()->json(['status' =>false, 'message' =>'Data not found','data'=>[]]);
    }
    }  
    public function planActivation(request $request)
    {
      $data = $request->all();
      if(isset($data['charge_id']))
      {
         $storePricing=DB::table('store_plans')->where("recurring_application_charge_id",$data['charge_id'])->first();
                 // for login
         $sinfo = Stores::where('id', $storePricing->store_id)->first();

         $encrypted_shop_id = Crypt::encryptString($sinfo->shop_id);
         $parameter="store_url=".$sinfo->store_url."&store_id=".$encrypted_shop_id;

         $pricing_plan = DB::table('price_plans')->where('id', $storePricing->plan_id)->first();
         $recurring_array = array("recurring_application_charge" => array(
          "name" => $pricing_plan->plan_title,
          "price" => $pricing_plan->plan_price,
          "api_client_id"=>rand(100000,99999999),
          "status"=>"accepted",
          "return_url"=> getenv('APP_URL').'/autologin?'.$parameter,
          "billing_on"=> null,
          "test"=>$pricing_plan->plan_env,
          "activated_on"=> null,
          "cancelled_on"=> null,
          "trial_days"=> $pricing_plan->plan_trial,
          "trial_ends_on" =>null,
          "decorated_return_url"=> getenv('APP_URL').'/autologin?'.$parameter));

         $ShopifyResponse=shopify_call($storePricing->store_id, '/admin/api/2020-04/recurring_application_charges/'.$data['charge_id'].'/activate.json', $recurring_array, 'POST');
         $res=json_decode($ShopifyResponse['response']);
         $charge=$res->recurring_application_charge;
         if($charge)
         {
            $postPlanAct=array(
            'status'=>$charge->status,
            'billing_on'=>$charge->billing_on,
            'activated_on'=>$charge->activated_on,
            'trial_ends_on'=>$charge->trial_ends_on);
            $response=DB::table('store_plans')->where('recurring_application_charge_id', $charge->id)->update($postPlanAct); 

           if($charge->status == "active")
           {
               $updateInfo=array("status"=>1);
               $response=DB::table('stores')->where('id', $storePricing->store_id)->update($updateInfo);
           }

           if($response)
           {
                       // $this->session->set_flashdata('msg_success', $messge="successfuly Activated plan.");
           }else{
                       // $this->session->set_flashdata('msg_error', $messge="something is wrong!");
           }
         }
         $parameter="store_url=".$sinfo->store_url."&store_id=".$encrypted_shop_id;
         return redirect(getenv('APP_URL').'/autologin?'.$parameter);
      }
    }


    public function appActivation(request $request)
    {
       $get  = $request->all();
       $store_status=2;
       $data['store_id']=0;

       if(!empty($get['shop']))
       {
          $storePricing=DB::table("app_publish_theme")->where('shop',$get['shop'])->first();
          if($storePricing)
           {
             $data['store_id']=$storePricing->store_id;
           }

          if(@$storePricing->status_front == 1)
          {
            //$data['store_status']=1;
            $store_status=1;
          }else{
            $store_status=2; 
          }
          //return response()->json(['status' =>false, 'message' =>'Data import','data' =>$data]); 
          return $store_status; 
       }else
       { 
         // return response()->json(['status' =>false, 'message' =>'Data import','data' =>$data]); 
          return $store_status; 
       }
    }

     /*
    * set Recommended Apps Data
    */
    public function recommendedApps( Request $request ) 
    {
        $data      = $request->all(); 
        $appNotShow='';
        if(isset($data['appNotShow']) && !empty($data['appNotShow']))
        {
          $appNotShow=$data['appNotShow'];
        }
        
        //$response = file_get_contents('http://indore.bitcotapps.com/shopify_test/appLogos/app_list.json');
        $response = file_get_contents('https://hubifyapps.com/apps/appLogos/app_list.json');
        $response = json_decode($response, true);
        $AppList=[];
        foreach($response AS $key=>$value)
        {
          if($value['sort_name'] != $appNotShow)
          {
            $AppList[]= $value;
          }
        }

        return response()->json(['status' =>true, 'message' =>'Success','data' =>$AppList]);
    }

}
