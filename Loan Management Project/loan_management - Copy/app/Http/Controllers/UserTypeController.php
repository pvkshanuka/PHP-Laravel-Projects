<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class UserTypeController extends Controller
{
    public function Addusertype(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'utype' => 'required|unique:employeetype,name',
        ],
         [
             'utype.required' => 'User Type field is required.',             
             'utype.unique' => 'Already have User type from this name.',             
             
         ]);
        
        if ($validator->fails())
        {
            error_log('Some message here.');
            return response()->json(['status'=>'1','errors'=>$validator->errors()->all()]);
        }

        $date = array();

        $data['name'] = $request->utype;
        $data['status'] = $request->status;
      
  
       DB::table('employeetype')->insert($data);
       return response()->json(['status'=>'2','success'=>'Record is successfully added']);
    }

    public function activeUsertype(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'cusid' => 'required',
        ],
         [
             'cusid.required' => 'User Type id is missing.',            
             
         ]);
        
        $custid = $request->cusid;

       DB::table('employeetype')
              ->where('employeeTypeId', $custid)
              ->update(['status' => 1]);

              
       return response()->json(['status'=>'2','success'=>'Record is successfully added']);

    }
    public function deactiveutype(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'employeeTypeId' => 'required',
        ],
         [
             'cusid.required' => 'User Type id is missing.',            
             
         ]);

        $custid = $request->cusid;

       DB::table('employeetype')
              ->where('employeeTypeId', $custid)
              ->update(['status' => 2]);

              return response()->json(['status'=>'2','success'=>'Record is successfully added']);

    }
}
