<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\User; 
use App\Mail\CommonEmail; 


//Create laravel errors array
if (! function_exists('errorArrayCreate')) 
{
    function errorArrayCreate($obj) {
        try{
            $obj = $obj->toArray();
            $errors = array();
            if( is_array($obj) && !empty($obj)){
                foreach($obj as $k => $v){
                    if( count($v) > 1 ){
                        $err = '';
                        foreach ($v as $value) {
                            $err.= $value.' && ';
                        }
                        trim($err,'&&');
                        $errors[$k] = $err;
                    }else{
                        $errors[$k] = $v[0];
                    }

                }
            }
            return $errors;
        }
        catch(\Exception $e){
            throw $e;
        }
    }
} 


if (! function_exists('testt')) 
{
    function testt($obj) {
        return $obj.'111111111';
    }

}


function datetimest(){
 date_default_timezone_set('Asia/Calcutta');
 return $currentDate =Date('Y-m-d H:i:s');
}
function nextDate(){
    $startDate = time();
 date_default_timezone_set('Asia/Calcutta');
 return $currentDate=date('Y-m-d H:i:s', strtotime('+1 day', $startDate));
}


if(!function_exists('storeInfo'))
{
    function storeInfo($store_id,$item)
    {         
        $ci =&get_instance();            
        $currencyResponce = $ci->db->get_where('stores',array("id"=>$store_id))->row_array();
        $appPublishResponce = $ci->db->get_where('app_publish_theme',array("store_id"=>$store_id))->row_array();
        $currencysymbole = $ci->db->get_where('currency',array("currency_code"=>$currencyResponce['currency']))->row_array();    
            if($item == "currency"){
                return $currencysymbole['symbol'];
            }else if($item == "status_front"){
                return $appPublishResponce['status_front'];
            }
            else{
                 return $currencyResponce[$item];
            }
    }   
  }


/********************** Send Mail **********************/
/*if ( ! function_exists('sendEmail'))
{
   
    function sendEmail($email, $subject, $msg,$from="support@hubifyapps.com",$fromName="Earning product recommandation") {
  $msg=str_replace('"',"'",$msg);
  $msg=preserveEmeddedPHP($msg);
$request="{\"personalizations\": [{\"to\": [{\"email\": \"$email\"}]}],\"from\": {\"email\": \"$from\",\"name\": \"$fromName\"},\"subject\": \"$subject\",\"content\": [{\"type\": \"text/html\", \"value\":\"$msg\"}]}";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.sendgrid.com/v3/mail/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 100,
  CURLOPT_TIMEOUT => 600,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $request,
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer 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",
    "cache-control: no-cache",
    "content-type: application/json",
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
 // echo "cURL Error #:" . $err;
    return 0;
} else {
 // echo $response;
  //  return true;
    return 1;
}
 

}    
}*/

//Common Email Send Function( Param1 => Template name, Param2 => Sender email , Param3 => Data send to template )
if (! function_exists('sendEmail')) {
    function sendEmail($view,$email,$data) {
        if (view()->exists('email_template.'.$view)) {
            $data['view'] = $view;
            return Mail::to($email)
                ->send(new CommonEmail($data));
        }else{
            return false;
        }
    }
}

if(!function_exists('shopify_call')) 
{
    function shopify_call($store_id, $api_endpoint, $query = array(), $method = 'GET', $request_headers = array()) {

        $result = DB::table('stores')->where('id', $store_id)->first();

    // Build URL
            $token=$result->access_token;
        $url = "https://" . $result->store_url . $api_endpoint;
        if (!is_null($query) && in_array($method, array('GET',  'DELETE'))) $url = $url . "?" . http_build_query($query);

    // Configure cURL
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, TRUE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 3);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 3);
    // curl_setopt($curl, CURLOPT_SSLVERSION, 3);
        curl_setopt($curl, CURLOPT_USERAGENT, 'My New Shopify App v.1');
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

    // Setup headers
        $request_headers[] = "";
        if (!is_null($token)) $request_headers[] = "X-Shopify-Access-Token: " . $token;
        curl_setopt($curl, CURLOPT_HTTPHEADER, $request_headers);

        if ($method != 'GET' && in_array($method, array('POST', 'PUT'))) {
            if (is_array($query)) $query = http_build_query($query);
            curl_setopt ($curl, CURLOPT_POSTFIELDS, $query);
        }
        
    // Send request to Shopify and capture any errors
        $response = curl_exec($curl);
        $error_number = curl_errno($curl);
        $error_message = curl_error($curl);

    // Close cURL to be nice
        curl_close($curl);

    // Return an error is cURL has a problem
        if ($error_number) {
            return $error_message;
        } else {

        // No error, return Shopify's response by parsing out the body and the headers
            $response = preg_split("/\r\n\r\n|\n\n|\r\r/", $response, 2);

        // Convert headers into an array
            $headers = array();
            $header_data = explode("\n",$response[0]);
        $headers['status'] = $header_data[0]; // Does not contain a key, have to explicitly set
        array_shift($header_data); // Remove status, we've already set it above
        foreach($header_data as $part) {
            $h = explode(":", $part);
            $headers[trim($h[0])] = trim($h[1]);
        }

        // Return headers and Shopify's response
       // return array('headers' => $headers, 'response' => $response[1]);
        return array('response' => $response[1]);

    }
}
}

if(!function_exists('shopify_store_info')) 
{
    function shopify_store_info($shop,$token,$api_endpoint, $query = array(), $method = 'GET', $request_headers = array()) {

    // Build URL

       $url = "https://" . $shop . $api_endpoint;
       if (!is_null($query) && in_array($method, array('GET',  'DELETE'))) $url = $url . "?" . http_build_query($query);

    // Configure cURL
       $curl = curl_init($url);
       curl_setopt($curl, CURLOPT_HEADER, TRUE);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
       curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
       curl_setopt($curl, CURLOPT_MAXREDIRS, 3);
       curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 3);
    // curl_setopt($curl, CURLOPT_SSLVERSION, 3);
       curl_setopt($curl, CURLOPT_USERAGENT, 'My New Shopify App v.1');
       curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
       curl_setopt($curl, CURLOPT_TIMEOUT, 30);
       curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

    // Setup headers
       $request_headers[] = "";
       if (!is_null($token)) $request_headers[] = "X-Shopify-Access-Token: " . $token;
       curl_setopt($curl, CURLOPT_HTTPHEADER, $request_headers);

       if ($method != 'GET' && in_array($method, array('POST', 'PUT'))) {
        if (is_array($query)) $query = http_build_query($query);
        curl_setopt ($curl, CURLOPT_POSTFIELDS, $query);
    }
    
    // Send request to Shopify and capture any errors
    $response = curl_exec($curl);
    $error_number = curl_errno($curl);
    $error_message = curl_error($curl);

    // Close cURL to be nice
    curl_close($curl);

    // Return an error is cURL has a problem
    if ($error_number) {
        return $error_message;
    } else {

        // No error, return Shopify's response by parsing out the body and the headers
        $response = preg_split("/\r\n\r\n|\n\n|\r\r/", $response, 2);

        // Convert headers into an array
        $headers = array();
        $header_data = explode("\n",$response[0]);
        $headers['status'] = $header_data[0]; // Does not contain a key, have to explicitly set
        array_shift($header_data); // Remove status, we've already set it above
        foreach($header_data as $part) {
            $h = explode(":", $part);
            $headers[trim($h[0])] = trim($h[1]);
        }

        // Return headers and Shopify's response
       // return array('headers' => $headers, 'response' => $response[1]);
        return array('response' => $response[1]);

    }
    
}
}
if(!function_exists('Getdata')) 
{
    function Getdata($store_id,$api_endpoint){

          $result = DB::table('stores')->where('id', $store_id)->first();
          $token=$result->access_token;
          $url = "https://" . $result->store_url . $api_endpoint;
          $curl = curl_init();
          curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "X-Shopify-Access-Token:".$token,
            "cache-control: no-cache",
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
         return $test=json_decode($response);
        }
    }
}

function preserveEmeddedPHP($string){
$html = preg_replace('/\>\s+\</m', '><', $string);
$html=trim(preg_replace('/[\t\n\r\s]+/', ' ', $html));
return $html;
}