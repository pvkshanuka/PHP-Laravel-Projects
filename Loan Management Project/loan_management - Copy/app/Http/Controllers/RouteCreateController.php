<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon;
use Illuminate\Support\Facades\Redirect;

class RouteCreateController extends Controller
{
    public function newroute(Request $request){


      $date = array();

      $data['routename'] = $request->routename1;
      $data['details'] = $request->details1;
      $data['status'] = $request->status;
    

     DB::table('route')->insert($data);
     return Redirect::to('/createroute');
    }
  
    public function newrouteAssigs(Request $request){
      
      $employeID = $request->empId;
    $today = \Carbon\Carbon::now();
      // dd($request->all());
      
      $clevel_data = DB::table('collector')->where('employeeId',$employeID)->get();
      // $collectorId;
          foreach ($clevel_data as  $rname) {
            $collectorId = $rname->idcollector;
          }
          
      $data = array();

      
      
      
      $data['routeId'] = $request->routeid;
      $data['idcollector'] = $collectorId;
      $data['datec'] = $today;
      $data['status'] =$request->status;

      DB::table('collectorroute')->insert($data);
     return Redirect::to('/assingroute');
    }

    public function CollectoreUpdateRoute(Request $request){
      $employeeid = $request->collectorId;
      $routeID = $request->routeid;
      $today = \Carbon\Carbon::now();

      $detais = array();

      $clevel_data1= DB::table('collector')->where('employeeId',$employeeid)->get();
      foreach ($clevel_data1 as  $name) {
        $collectorId = $name->idcollector;
        
      }
      DB::update('update collectorroute set idcollector = ?,end_date=? where routeId = ?',[$collectorId,$today, $routeID]);
   

    
return response()->json($detais);
     

    }

    public function loadEmployeeData(Request $request){

        $employee = DB::table('employee')->where('employeeTypeId',4)->get();

        return response()->json($employee);

    }

    public function loadrouteassingload(Request $request){
      $data = DB::table('collectorroute')
      ->join('collector', 'collector.idcollector', '=', 'collectorroute.idcollector')
      ->Join('employee', 'employee.employeeId', '=', 'collector.employeeId')
      ->Join('route', 'route.routeId', '=', 'collectorroute.routeId')
      ->get();

      $data1 = DB::table('employee')->where('employeeTypeId','=','4')->get();

      return response()->json($data1);

    }
    
    
}
