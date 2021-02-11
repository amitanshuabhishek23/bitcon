<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Stores;
use App\Models\WidgetsList;
use App\Models\WidgetsPageList;
use App\Models\DisplayWidget;

class DashboardController extends Controller
{

    protected $widgetsListObj;
    protected $widgetsPageListObj;
    protected $displayWidget;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->widgetsListObj     = new WidgetsList();
        $this->widgetsPageListObj = new WidgetsPageList();
        $this->displayWidgetObj   = new displayWidget();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($storeId=0)
    {
        $columns    = ['*'];
        $whereFilter= ['store_id'=>$storeId];
        
        $allData = DisplayWidget::with([
            "widgets_list_detsils"=>function($q){
                $q->select('id','widget_predefine_title','widget_predefine_description');
            },
            "widgets_page_lists_details"=>function($q){
                $q->select('id','widget_page_name','path');
            }
        ])
        ->select($columns)
        ->where(function ($query) use ($whereFilter){
            if(!empty($whereFilter)){
                $query->where($whereFilter);
            }
        })
        ->orderBy('id','asc')
        ->get()
        ->all();

        if($allData)
        {
            return response()->json(['status' =>true, 'data' =>$allData]);
        }
        else
        {
            return response()->json(['status' =>true, 'message' =>'Data not found','data'=>[]]);
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
    public function show(Request $request)
    {
        $model   = DisplayWidget::find($request->widget_id);
        if(empty($model)){
            return response()->json(['status' =>false, 'message' => "Invalid widget id {$request->widget_id}."]);
        }

        $storeModel   = Stores::find($request->store_id);
        if(empty($storeModel)){
            return response()->json(['status' =>false, 'message' => "Invalid store id {$request->store_id}."]);
        }

        $whereFilter = ['id'=>$request->widget_id,'store_id'=>$request->store_id];
        $result      = $this->displayWidgetObj->getDisplayWidgetList("*",$whereFilter);
        if($result)
        {
            return response()->json(['status' =>true, 'data' =>$result]);
        }
        else
        {
            return response()->json(['status' =>true, 'message' =>'Data not found','data'=>[]]);
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
