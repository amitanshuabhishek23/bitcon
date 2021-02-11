<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\ContactSupport;
use App\Models\Stores;

class ContactSupportController extends Controller
{
    protected $storeObj;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->storeObj = new Stores();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        * set validation rules
        */
        $rules = [
            'store_id'  => 'required',
            'name'      => 'required',
            'email'     => 'required|email',
            'subject'   => 'required',
            'message'   => 'required',
        ];
        $message = [];
        $validator = Validator::make($request->all(), $rules,$message);
        if ($validator->fails()) {
            $allMessages = $validator->messages();
            $result      = errorArrayCreate($allMessages);
            return response()->json([
                'status'    => false,
                'message'   => 'Please fill correct data',
                'errors'    => $result
            ]);
        }

        //Check: Is store id valid
        $model  = Stores::find($request->store_id);
        if(empty($model)){
            return response()->json(['status' =>false, 'message' => "Invalid store id {$request->store_id}."]);
        }

        /*
        * Data process into table
        */
        $insertData = [
            'store_id'  => $request->store_id,
            'name'      => $request->name,
            'email'     => $request->email,
            'subject'   => $request->subject,
            'message'   => $request->message,
        ];
        $createdValues = ContactSupport::create($insertData);
        if($createdValues)
        {
            //Send thank you mail to requester
            $thankData = [
                'name'      => $request->name,
                'email'     => $request->email,
                'subject'   => env('APP_NAME')." Support: ",
                'message'   => $request->subject,
            ];
            sendEmail('thank-you',$thankData['email'],[
                'subject'       => $thankData['subject'].$request->subject,
                'user_detail'   => ($thankData)?$thankData:array(),
            ]);

            //Send thank you mail to requester
            $supportEmail     = env('MAIL_FROM_ADDRESS');
            $adminData = [
                'name'        => "Admin",
                'email'       => $supportEmail,
                'subject'     => env('APP_NAME')." Support: ",
                'user_name'   => $request->name,
                'user_email'  => $request->email,
                'user_subject'=> $request->subject,
                'user_message'=> $request->message,
            ];
            sendEmail('contact-support',$adminData['email'],[
                'subject'       => $adminData['subject'].$request->subject,
                'user_detail'   => ($adminData)?$adminData:array(),
            ]);

            return response()->json(['status' =>true, 'message' =>'Successfully Submited.']);
        }
        else
        {
            return response()->json(['status' =>false, 'message' => 'Problem in Submitting,try again.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
