<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Validator, DB;


// Load models
use App\Models\Stores;
class AppAuthController extends Controller
{
    /**
    * Show the application.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
  public function index(Request $request)
  {

    $data = $request->all();
    if (!empty($data))
     {    
        $store = $data['shop'];            
        $store=str_replace('http://', '', $store);
        $store=str_replace('https://', '', $store);
        $store=str_replace('/', '', $store);
        $storeCheck=explode(".", $store);
        if($storeCheck[1] != "myshopify"){
            $this->session->set_flashdata('msg_error', $messge="This is not valid url please add shopify url eg. test-shop.myshopify.com");
            redirect($_SERVER['HTTP_REFERER']);   
        }

        $nonce=rand();
        $api_key = getenv('SHOPIFY_APIKEY');
        $scopes = getenv('SHOPIFY_SCOPES');
        $redirect_uri = urlencode(getenv('SHOPIFY_REDIRECT_URI'));

        $qury=DB::table('installs')->insert([
        'store'      => $store,
        'nonce'      => $nonce,
        'access_token' =>"",
        ]);

        if ($qury) {
            $url = "https://{$store}/admin/oauth/authorize?client_id={$api_key}&scope={$scopes}&redirect_uri={$redirect_uri}&state={$nonce}";
            return redirect()->away($url);
        }else{
            $url = "https://{$store}/admin/oauth/authorize?client_id={$api_key}&scope={$scopes}&redirect_uri={$redirect_uri}&state={$nonce}";
            return redirect()->away($url);
        }
      
    } 
    else
    {

      redirect("index");

    }
  }

  public function login()
  {

    $api_key = getenv('SHOPIFY_APIKEY');
    $secret_key = getenv('SHOPIFY_SECRET');
    $query = $_GET; 
    if (!isset($query['code'], $query['hmac'], $query['shop'], $query['state'], $query['timestamp']))
    {
       exit;
    }

    $hmac = $query['hmac'];
    unset($query['hmac']);

    $params = [];
    foreach ($query as $key => $val) 
    {
      $params[] = "$key=$val";
    } 

    asort($params);
    $params = implode('&', $params);
    $calculated_hmac = hash_hmac('sha256', $params, $secret_key);

    $store = $query['shop'];
    $nonce=$query['state'];
    if($hmac === $calculated_hmac)
    {
      $client = new Client();
      $response = $client->request(
        'POST', 
        "https://{$store}/admin/oauth/access_token",
        [
          'form_params' => [
            'client_id' => $api_key,
            'client_secret' => $secret_key,
            'code' => $query['code']
          ]
        ]
      );

      $data = json_decode($response->getBody()->getContents(), true);
      $access_token = $data['access_token'];

      $nonce = $query['state']; 
      $insQuery = DB::table('installs')->where('nonce', $nonce)->where('store', $store)->first();

      if ($insQuery) 
      {
        $id=$insQuery->id;
        if ($id > 0) 
        {
          DB::table('installs')->where('id', $id)->update(array('access_token' => $access_token));                 
        }
      }
      $store_id=$this->store_info($store,$access_token);
      //hide store Update This for plan 
     // return $this->storePlanUpdate($store_id);

       $sinfo = DB::table('stores')->where('id', $store_id)->first();
         $encrypted_shop_id = Crypt::encryptString($sinfo->shop_id);
         $parameter="store_url=".$sinfo->store_url."&store_id=".$encrypted_shop_id;
         return redirect('/autologin?'.$parameter);
    }
  }

  /*
  * This function use when APP load
  */
  
    public function store_info($shop,$token)
    {
        $infoCheck = DB::table('stores')->where('store_url', $shop)->first();
        // Run API call to get products
        $products = shopify_store_info($shop,$token, "/admin/api/2020-04/shop.json", array(), 'GET');
        $res=json_decode($products['response']);
        ///  print_r($res); die;
        if(!$res){
            echo "We are getting some error. please install again!";
        }
        $storeinfo=$res->shop;
        $post_data=array(
            'store_url'=>$shop,
            'shop_id'=>$storeinfo->id,
            'access_token'=>$token,
            'email'=>$storeinfo->email,
            'store_name'=>$storeinfo->name,
            'country_name'=>$storeinfo->country_name,
            'shop_owner'=>$storeinfo->shop_owner,
            'customer_email'=>$storeinfo->customer_email,
            'phone'=>$storeinfo->phone,
            'iana_timezone'=>$storeinfo->iana_timezone,
            'currency'=>$storeinfo->currency,
            'money_in_emails_format'=>$storeinfo->money_in_emails_format,
            'money_with_currency_in_emails_format'=>$storeinfo->money_with_currency_in_emails_format,
            'province'=>$storeinfo->province,
            'address'=>$storeinfo->address1,
            'city'=>$storeinfo->city,
            'zip'=>$storeinfo->zip
        );
        if($infoCheck)
        {

            $store_id= $infoCheck->id;
            DB::table('stores')->where('store_url', $shop)->update($post_data); 
        }else
        {
            $post_data['created_at']=NOW();     
            $store_id=DB::table('stores')->insertGetId($post_data);
            $getUser = DB::table('stores')->where('store_url', $shop)->first();
            DB::table('users')->insert([
            'name' => $getUser->shop_owner,
            'store_name' => $getUser->store_name,
            'store_url' => $getUser->store_url,
            // 'email' => $getUser->store_url,
            'email' => $getUser->email,
            'password' => Hash::make($getUser->shop_id),
            'shop_u_id' => $getUser->shop_id,
            'store_id' => $getUser->id,
            'status' => '1', 
            'created_at' => NOW() ]); 

            // $this->layoutReset($store_id); 
            $this->installDefault($store_id,$shop);  
            $this->Webhook_store($store_id);   
            $this->EmailInstallApp($storeinfo->shop_owner,$storeinfo->email,$shop);         
        }
        return $store_id;
    }

  function installDefault($store_id,$shop)
  {
    $products=shopify_call($store_id, "/admin/api/2020-04/themes.json", array(), 'GET');
    $res=json_decode($products['response']);
    //print_r($res); die;
    $themeList= $res->themes;
    $themess='';
    foreach($themeList AS $item) 
    {
      if($item->role == "main")
      {
        $themess=$item->id."@".$item->name;
        continue;
      }
    } 

    if(isset($themess))
    {
      $themes=explode("@", $themess);
      $bc_theme_id=$themes[0];       
      $theme_name=$themes[1];        
      $snippets=$this->product_pinch_zoom(0);
      $snippets_array = array("asset" => array("content_type" => "text/html",
      "key" => "snippets/product_pinch_zoom.liquid",
      "theme_id"=>$bc_theme_id,
      "value"=>$snippets));

      $products=shopify_call($store_id, '/admin/themes/'.$bc_theme_id.'/assets.json', $snippets_array, 'PUT');
      /// create script tag
      $scriptTags=shopify_call($store_id, '/admin/api/2020-04/script_tags.json',array(), 'GET');
      $res=json_decode($scriptTags['response']);
      if($res->script_tags)
      {
        foreach ($res->script_tags as $item) 
        {
          shopify_call($store_id, '/admin/api/2020-04/script_tags/'.$item->id.'.json',array(), 'DELETE');
        }
      }    

      /*$snippets_create_script_js=array("script_tag" => array(
      "event" => "onload",
      "src"=>getenv('BASE_URL')."public/front_end/js/jquery.min.js"));
      //"src"=>"//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"));
      shopify_call($store_id, '/admin/api/2020-04/script_tags.json', $snippets_create_script_js, 'POST');
      */
      $snippets_create_script=array("script_tag" => array(
      "event" => "onload",
      "src"=>getenv('BASE_URL')."public/front_end/js/zoom_magnifier.js"
      //"src"=>"//indore.bitcotapps.com/shopify_test/pinchandzoom/zoom_magnifier.js"
    ));
      // "src"=>"//indore.bitcotapps.com/shopify_test/newZoom/zoom_magnifier.js"));
      $products=shopify_call($store_id, '/admin/api/2020-04/script_tags.json', $snippets_create_script, 'POST'); 


      $scriptTags=shopify_call($store_id, '/admin/themes/'.$bc_theme_id.'/assets.json?asset[key]=layout/theme.liquid&theme_id='.$bc_theme_id,array(), 'GET');

      $res=json_decode($scriptTags['response']);
      $themeLiquid=$res->asset->value;
      $themeLiquid=str_replace("{% include 'product_pinch_zoom' %}","", $themeLiquid);
      $exhtml=explode("</body>", $themeLiquid);
      $appendHtml="{% include 'product_pinch_zoom' %}";
      $finalHtml=$exhtml[0].$appendHtml."\n\r </body>".$exhtml[1];


      // main theme.liquid backup
      $themeArrayMain = array("asset" => array("content_type" => "text/html",
      "key"=> "layout/theme-ai-product-theme.liquid",
      "source_key"=> "layout/theme.liquid"
      // "theme_id"=>$bc_theme_id,
      ));    
      shopify_call($store_id, '/admin/themes/'.$bc_theme_id.'/assets.json', $themeArrayMain, 'PUT');

      // theme.liquid updated
      $theme_array = array("asset" => array("content_type" => "text/html",
      "key" => "layout/theme.liquid",
      "theme_id"=>$bc_theme_id,
      "value"=> $finalHtml));

      $products=shopify_call($store_id, '/admin/themes/'.$bc_theme_id.'/assets.json', $theme_array, 'PUT');
      if($products)
      {
        $pricing_plan = DB::table('app_publish_theme')->where('store_id', $store_id)->first();
        $posttheme=array(
        "theme_id"=>$bc_theme_id,  
        "store_id"=>$store_id,  
        "shop"=>$shop,  
        "theme_name"=>$theme_name, 
        "status_front"=>0, 
        "created_at"=>datetimest(), 
        );

        if($pricing_plan){          
          DB::table('app_publish_theme')->where('store_id', $store_id)->update($posttheme);
        }else{
          DB::table('app_publish_theme')->insertGetId($posttheme);
        }
      }
    }
  }


  function storePlanUpdate($store_id)
  {
        $storePricing=DB::table('store_plans')->where('store_id',$store_id)->first();
        $sinfo = DB::table('stores')->where('id', $store_id)->first();
        if(!$storePricing)
        {
            $pricing_plan = DB::table('price_plans')->where('id', 1)->first();
            $recurring_array = array("recurring_application_charge" => array(
            "name" => $pricing_plan->plan_title,
            "price" => $pricing_plan->plan_price,
            "return_url"=>getenv('APP_URL').'/api/planActivation',
            "test"=>$pricing_plan->plan_env,
            "trial_days"=>$pricing_plan->plan_trial
            ));
            $ShopifyResponse=shopify_call($store_id, '/admin/api/2020-04/recurring_application_charges.json', $recurring_array, 'POST');
            $res=json_decode($ShopifyResponse['response']);
            $charge=$res->recurring_application_charge;

            if($charge)
            {
                $postPlan=array(
                "plan_id"=>$pricing_plan->id,
                "recurring_application_charge_id"=>$charge->id,
                "api_client_id"=>$charge->api_client_id,
                "price"=>$charge->price,
                "status"=>$charge->status,
                "confirmation_url"=>$charge->confirmation_url,
                "store_id"=>$store_id,
                "billing_on"=>$charge->billing_on,
                "trial_days"=>$charge->trial_days,
                "created_at"=>datetimest());
                DB::table('store_plans')->insertGetId($postPlan);
                return redirect($charge->confirmation_url);
            } else
            {
                $this->session->set_flashdata('msg_error', $messge="Failed");
                return redirect()->away('dashboard');
            }
        }else
        {
            if($storePricing->status != "active")
            {
                $pricing_plan = DB::table('price_plans')->where('id', 1)->first();
                $recurring_array = array("recurring_application_charge" => array(
                "name" => $pricing_plan->plan_title,
                "price" => $pricing_plan->plan_price,
                "return_url"=>getenv('APP_URL').'/api/planActivation',
                "test"=>$pricing_plan->plan_env,
                "trial_days"=>$pricing_plan->plan_trial
                ));
                // print_r($this->store_id); die;
                $ShopifyResponse=shopify_call($store_id, '/admin/api/2020-04/recurring_application_charges.json', $recurring_array, 'POST');
                $res=json_decode($ShopifyResponse['response']);
                $charge=$res->recurring_application_charge;

                if($charge)
                {
                    $postPlan=array(
                    "plan_id"=>$pricing_plan->id,
                    "recurring_application_charge_id"=>$charge->id,
                    "api_client_id"=>$charge->api_client_id,
                    "price"=>$charge->price,
                    "status"=>$charge->status,
                    "confirmation_url"=>$charge->confirmation_url,
                    "store_id"=>$store_id,
                    "billing_on"=>$charge->billing_on,
                    "trial_days"=>$charge->trial_days,
                    "created_at"=>datetimest());
                    $storeUpdate=DB::table('store_plans')->where('store_id', $store_id)->update($postPlan);
                    echo $charge->confirmation_url;
                    return redirect()->away($charge->confirmation_url);
                } else
                {
                    $this->session->set_flashdata('msg_error', $messge="Failed");
                    return redirect()->away('dashboard');
                }
            }else
            {
                $encrypted_shop_id = Crypt::encryptString($sinfo->shop_id);
                $parameter="store_url=".$sinfo->store_url."&store_id=".$encrypted_shop_id;
                return redirect(getenv('APP_URL').'/autologin?'.$parameter);
            }

        }
  }


   function product_pinch_zoom($status_front)
   {
        return '{% comment %} ---product_pinch_zoom---
        Do not edit this file.
        This snippet is auto generated and will be overwritten.
        {% endcomment %}
        <script>
        var ai_shop=Shopify.shop;
        var ai_shopStatus='.$status_front.';
        var ai_zoom_template="{{template}}";
        </script>
        ';
    }


  public function Webhook_store($store_id)
  {
     $ShopInfo = DB::table('stores')->where('id', $store_id)->first();
     /// store data delete
     $snippets_create_script=array("webhook" => array(
       "topic" => "app/uninstalled",
       "address"=>getenv('BASE_URL').'api/shop_data_erasure?store_id='.$store_id."&shop_id=".$ShopInfo->shop_id."&shop_domain=".$ShopInfo->store_url,
       "format"=>"json",
     )); 
     shopify_call($store_id, '/admin/api/2020-04/webhooks.json', $snippets_create_script, 'POST');
     /*
      /// store product create
     $snippets_create_script_products_create=array("webhook" => array(
       "topic" => "products/create",
       "address"=>getenv('BASE_URL').'api/ProductCreateUpdateFromStore?store_id='.$store_id,
       "format"=>"json",
     ));
     shopify_call($store_id, '/admin/api/2020-04/webhooks.json', $snippets_create_script_products_create, 'POST');

      /// store product update
     $snippets_create_script_products_update=array("webhook" => array(
       "topic" => "products/update",
       "address"=>getenv('BASE_URL').'api/ProductCreateUpdateFromStore?store_id='.$store_id,
       "format"=>"json",
     ));
     shopify_call($store_id, '/admin/api/2020-04/webhooks.json', $snippets_create_script_products_update, 'POST');

     /// store product delete
     $snippets_create_script_products_delete=array("webhook" => array(
       "topic" => "products/delete",
       "address"=>getenv('BASE_URL').'api/ProductDeleteFromStore?store_id='.$store_id,
       "format"=>"json",
     ));
     shopify_call($store_id, '/admin/api/2020-04/webhooks.json', $snippets_create_script_products_delete, 'POST');
     */
  }

  public function EmailInstallApp($name,$email,$shop)
  {
      /// for customer 
      $supportinstallData = [
        'name'      => $name,
        'shop'      => $shop,
        'app_name'      => getenv('APP_NAME'),
        'email'     => $email,
        'subject'   => "Thank you for installing ".getenv('APP_NAME')." app",
      ];
      sendEmail('app-install',$supportinstallData['email'],[
        'subject'       => $supportinstallData['subject'],
        'user_detail'   => ($supportinstallData)?$supportinstallData:array(),
      ]);

      /// for support 
      $mailTo="lalutale@bitcot.com";
      $thankData = [
        'name'      => "Support",
        'shop'      => $shop,
        'email'     => $email,
        'subject'   => getenv('APP_NAME').": app Install",
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
  }
}
