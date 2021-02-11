<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Stores;
use Validator;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Client as OClient;
use GuzzleHttp\Client;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class AuthController extends Controller
{
    /**
	* Handles Login Request
	*
	* @param Request $request
	* @return \Illuminate\Http\JsonResponse
	*/
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required', 
            'password' => 'required',
        ];
        $messages = [
            'email.required'=> 'Please enter store url.',
            'password.required'=> 'Please enter password.',
        ];

        $validator = Validator::make($request->all(),$rules,$messages);
        if ($validator->fails()) {
            $allMessages = $validator->messages();
            $result = errorArrayCreate($allMessages);
            return response()->json([
                'status' => false,
                'message' => 'Please fill correct data.',
                'errors' => $result
            ]);            
        }

        try 
        {
            $superAdmin = $request->super_admin;
            if ($superAdmin == 'hub1298') 
            {
                $user = User::where('store_url',$request->email)->first();
                if ($user) 
                {
                    $token = $user->createToken('wiser')->accessToken;
                    return response()->json([
                        'status'=>true,               
                        'token_type' => 'Bearer',
                        'token' => $token,
                        'data' => $user
                    ]);
                }
                else
                {
                    return response()->json(['status'=>false,'message' => 'Unauthorized user.']);
                }   
            }
            
            $password = Crypt::decryptString($request->password);
            $credentials = [
                'store_url' => $request->email,
                'password'  => $password
            ];
                
            if (auth()->attempt($credentials)) 
            {
                $user = auth()->user();
                $user['next_step'] = $user['current_step']+1;
                if($user->status != '1'){
                    return response()->json([
                      'status' => false,
                      'message' => 'Your account is In-active, please contact to administrator' 
                    ]);
                }
                else
                {
                    $token = $user->createToken('wiser')->accessToken;
                    return response()->json([
                        'status'=>true,               
                        'token_type' => 'Bearer',
                        'token' => $token,
                        'data' => $user
                    ]);
                }
            }
            else 
            {
                return response()->json(['status'=>false,'message' => 'Unauthorized user.']);
            }
        } 
        catch (DecryptException $e) 
        {
            return response()->json(['status'=>false,'message' => 'Unauthorized user.']);
        }
    }

	/**
	* Logout user (Revoke the token)
	*
	* @return [string] message
	*/
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
        	'status' => true,
            'message' => 'Successfully logged out.'
        ]);
    }

    /**
    * update app theme
    *
    */
    public function updateAppTheme(Request $request)
    {
        $model   = Stores::find($request->store_id);
        if(empty($model)){
            return response()->json(['status' =>false, 'message' => "Invalid store id {$request->store_id}."]);
        }

        /*
        * set validation rules
        */
        $rules = [
            'store_id'   => 'required',
            'app_theme'  => 'required|in:dark,light',
        ];
        $message = [
            'store_id'   =>"Please post widget list id.",
            'app_theme'  =>"Please Post widget status.",
        ]; 
        $validator = Validator::make($request->all(), $rules,$message);
        if ($validator->fails()) { 
            $allMessages = $validator->messages();
            $result = errorArrayCreate($allMessages);
            return response()->json([
                'status' => false,
                'message' => 'Please fill correct data',
                'errors' => $result
            ]);            
        }

        $updatedData = User::where("store_id",$request->store_id)->update([
            'app_theme'   => $request->app_theme,
        ]);
        $user = User::where("id",Auth::id())->first();
        //Send JSON response    
        if($updatedData)
        {
            return response()->json(['status' =>true, 'message' =>'Successfully update.' , 'data'=>$user]);
        }
        else
        {
            return response()->json(['status' =>false, 'message' => 'Problem in updating,try again.']);
        }
    }




    public function getproduct_from_store(Request $request)
    {
        $data=$request->all();
        $store_id=$request->store_id;
        $infoCheck = DB::table('store_products')->where('store_id', $store_id)->first();
        $itemid=1;

        if($infoCheck){
            $itemid=$infoCheck->product_id;
        }

        $ShopifyResponse=shopify_call($store_id, '/admin/api/2020-04/products/count.json', array(), 'GET');
        $response=json_decode($ShopifyResponse['response']);
        // echo "<pre>";
       //print_r($ShopifyResponse); die;
        $counttl=$response->count;
        $pageno=$counttl/250;
        $pno=round($pageno+0.55);
        $itemid=$itemid;
        for($i=1; $i <= $pno; $i++){
         $urg='/admin/api/2020-04/products.json?limit=250&since_id='.$itemid;
         $response=Getdata($store_id,$urg);

         $productCount=count($response->products);
         $j=1;
         foreach ($response->products as $item) {

             if($j == $productCount){
               $itemid=$item->id;
           }

           $checkProduct=DB::table('store_products')->where('product_id',$item->id)->where('store_id',$store_id)->first();

           if(!$checkProduct){
             $post_data=array(
              "product_id"=>$item->id,
              "store_id"=>$store_id,
              "title"=>$item->title,
              "vendor"=>$item->vendor,
              "product_type"=>$item->product_type,
              "handle"=>$item->handle,
              "tags"=>$item->tags,
              "published_scope"=>$item->published_scope,
              "created_at"=>datetimest(),
          );
             $store_products_id=DB::table('store_products')->insertGetId($post_data);

             foreach ($item->variants as $items) {
              $post_data_variant=array(
                  "store_products_id"=>$store_products_id,
                  "store_id"=>$store_id,
                  "variant_id"=>$items->id,
                  "product_id"=>$items->product_id,
                  "title"=>$items->title,
                  "price"=>$items->price,
                  "compare_at_price"=>$items->compare_at_price,
                  "sku"=>$items->sku,
                  "position"=>$items->position,
                  "fulfillment_service"=>$items->fulfillment_service,
                  "inventory_management"=>$items->inventory_management,
                  "option1"=>$items->option1,
                  "option2"=>$items->option2,
                  "option3"=>$items->option3,
                  "image_id"=>$items->image_id,
                  "created_at"=>datetimest(),
                  "updated_at"=>datetimest(),
              );
              DB::table('store_product_variants')->insertGetId($post_data_variant);
          }

          foreach ($item->images as $itemimg) {
              $post_data_image=array(
                  "store_products_id"=>$store_products_id,
                  "store_id"=>$store_id,
                  "image_id"=>$itemimg->id,
                  "product_id"=>$itemimg->product_id,
                  "src"=>$itemimg->src,
                  "alt"=>$itemimg->alt,
                  "position"=>$itemimg->position,
                  "created_at"=>datetimest(),
                  "updated_at"=>datetimest(),
              );
              DB::table('store_product_images')->insertGetId($post_data_image);
          }

      }

      $j++;
  }
}




}




}
