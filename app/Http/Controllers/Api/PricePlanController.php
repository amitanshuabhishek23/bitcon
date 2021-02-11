<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

// Load models
use App\Models\Stores;
use App\Models\PricePlans;
use App\Models\StorePlan;

class PricePlanController extends Controller
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
        $this->storePlanObj = new StorePlan();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=0)
    {
        $storeId = $id;
        $storesModel = Stores::find($storeId);
        if(empty($storesModel))
        {
            return response()->json(['status' => false, 'message' => "Invalid store id {$storeId}."]);
        }
        $allData = PricePlans::select('*')->get()->all();

        // send api response
        if($allData)
        {
            return response()->json(['status' => true,'data' => $allData]);
        }
        else
        {
            return response()->json(['status' => true, 'message' => 'Data not found','data'=>[]]);
        }
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
        $storeId = $id;
        $storesModel = Stores::find($storeId);
        if(empty($storesModel))
        {
            return response()->json(['status' => false, 'message' => "Invalid store id {$storeId}."]);
        }

        // get data from store plan table
        $columns     = ['id','store_id','plan_id','price','status'];
        $whereFilter = ['store_id' => $storeId,'status' => 'active'];
        $storePlan = $this->storePlanObj->getActivePlan($columns,$whereFilter);

        // send api response
        if($storePlan)
        {
            return response()->json(['status' => true,'data' => $storePlan]);
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
