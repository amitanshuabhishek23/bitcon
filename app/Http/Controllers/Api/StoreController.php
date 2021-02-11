<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Load models
use App\Models\Stores;

class StoreController extends Controller
{
     // models object
     protected $storePlanObj;

     /**
      * Create a new controller instance.
      *
      * @return void
      */
     public function __construct()
     {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id=0)
    {
        // find store is exist or not
        $storeId     = $id;
        $storesModel = Stores::find($storeId);
        if(empty($storesModel))
        {
            return response()->json(['status' => false, 'message' => "Invalid store id {$storeId}."]);
        }

        // get data from store plan table
        $columns     = ['*'];
        $whereFilter = ['id' => $storeId];
        $storeData   = $this->storeObj->getStore($columns,$whereFilter);
        $storeData['currency_sign'] = preg_replace('/{{(.*?)}}/', '', $storeData->money_in_emails_format);
        
        // send api response
        if($storeData)
        {
            return response()->json(['status' => true,'data' => $storeData]);
        }
        else
        {
            return response()->json(['status' => true, 'message' => 'Data not found','data'=>[]]);
        }
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
