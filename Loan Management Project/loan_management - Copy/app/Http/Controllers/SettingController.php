<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
class SettingController extends Controller
{
    //
    public function newholidayAdd(Request $request){


        $data = array();
        $value = $request->session()->get('empid');
        $data['name'] = $request->name;   
        $data['datec'] = $request->hdate;   
        $data['employeeId'] = $value;   
        $data['status'] = $request->status;
      
  
       DB::table('holidays')->insert($data);
    //    return Redirect::to('/dailyloan_create');
    }
    public function newaccount(Request $request){
        $data = array();
        $value = $request->session()->get('empid');
        $data['accName'] = $request->bankname1;
        $data['accNumber'] = $request->accnum1;
       
        $data['status'] = $request->status;
        $data['employeeId'] = $value;
      
  
       DB::table('bankaccount')->insert($data);
       return Redirect::to('/dailyloan_create');
    }
    public function newloantype(Request $request){
        $data = array();

        $data['name'] = $request->loantype1;
        $data['status'] = $request->status;
    
      
  
       DB::table('loantype')->insert($data);
       return Redirect::to('/dailyloan_create');
    }

    public function deletAccount(Request $request){
        $accid = $request->accid;
        DB::table('bankaccount')->where('accountId', $accid)->delete();
    }


    public function loadholidays(Request $request){

        $data1 = array();

        $data = DB::table('holidays')->get();
       
        $data2 = [];
    foreach ($data as $label)
        {
        $data2[] = [
        'name' => $label->name,
        'date' => $label->datec,
        'id' => $label->idholidayId
            ];
        }

    //     return response()->json($data2);

    return json_encode(array($data2));


    }

    public function deletholiday(Request $request){
        $accid = $request->h_id;
        DB::table('holidays')->where('idholidayId', $accid)->delete();
    }


}
