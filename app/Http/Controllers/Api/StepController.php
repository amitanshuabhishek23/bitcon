<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//load model
use App\Models\User;
use App\Models\Stores;
use Validator;
use Illuminate\Support\Facades\Auth;

class StepController extends Controller
{
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
        //
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
    public function update(Request $request)
    {
        $model   = Stores::find($request->store_id);
        if(empty($model)){
            return response()->json(['status' =>false, 'message' => "Invalid store id {$request->store_id}."]);
        }

        /*
        * set validation rules
        */
        $rules = [
            'store_id'   => 'required|integer',
            'next_step'  => 'required|integer',
        ];
        $message = [
            'store_id'   =>"Please post widget list id.",
            'next_step'  => 'Please post step no.',
        ]; 
        $validator = Validator::make($request->all(), $rules,$message);
        if ($validator->fails()) { 
            $allMessages = $validator->messages();
            $result = errorArrayCreate($allMessages);
            return response()->json([
                'status'  => false,
                'message' => 'Please fill correct data',
                'errors'  => $result
            ]);            
        }
        /*
        * Get step details
        */
        $data = User::where("id",Auth::id())->first();

        $updatedData = User::where("store_id",$request->store_id)->update([
            'current_step'   => $request->next_step,
        ]);

        $userData = User::where("id",Auth::id())->first();
        //Send JSON response    
        if($userData)
        {
            $userData['next_step'] = $userData['current_step']+1;
            return response()->json(['status' =>true, 'message' =>'Successfully update.' , 'data'=>$userData]);
        }
        else
        {
            return response()->json(['status' =>false, 'message' => 'Problem in updating,try again.']);
        }
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
