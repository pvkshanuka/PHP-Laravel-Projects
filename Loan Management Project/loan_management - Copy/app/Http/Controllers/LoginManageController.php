<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoginManageController extends Controller
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

    public function updateLoginEmpStatDeactive(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'emplgid' => 'required|exists:login,idlogin',
        ],
         [             
             'emplgid.required' => 'Employee ID is Missing .',
             'emplgid.exists' => 'Not Exist this Employee Login.',
             
         ]);
        
        if ($validator->fails())
        {
            return response()->json(['status'=>'1','errors'=>$validator->errors()->all()]);
        }

        $emplgid = $request->emplgid;

        DB::table('login')
        ->where('idlogin', $emplgid)
        ->update(['lgstatus' => 2]);

        return response()->json(['status'=>'2','success'=>'Record is successfully Updated']);

    }

    public function updateLoginEmpStatActive(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'emplgid' => 'required|exists:login,idlogin',
        ],
         [             
             'emplgid.required' => 'Employee ID is Missing .',
             'emplgid.exists' => 'Not Exist this Employee Login.',
             
         ]);
        
        if ($validator->fails())
        {
            return response()->json(['status'=>'1','errors'=>$validator->errors()->all()]);
        }

        $emplgid = $request->emplgid;

        DB::table('login')
        ->where('idlogin', $emplgid)
        ->update(['lgstatus' => 1]);

        return response()->json(['status'=>'2','success'=>'Record is successfully Updated']);

    }

    public function updateEmpStatActive(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'emplgid' =>  'required|exists:login,idlogin',
            'empid' => 'required|exists:employee,employeeId',
            'adid' => 'required|exists:login,idlogin,idlogin,1',
        ],
         [             
             'emplgid.required' => 'Employee login ID is Missing .',
             'empid.required' => 'Employee ID is Missing .',
             'empid.exists' => 'Not Exist this Employee.',
             'emplgid.exists' => 'Not Exist this Employee Login.',
             'adid.required' => 'Admin is not Login.',
             'adid.exists' => 'You have no access to do this.',
             
         ]);
        
        if ($validator->fails())
        {
            return response()->json(['status'=>'1','errors'=>$validator->errors()->all()]);
        }

        $empid = $request->empid;
        $emplgid = $request->emplgid;

        DB::table('employee')
        ->where('employeeId', $empid)
        ->update(['status' => 1]);

        DB::table('login')
        ->where('idlogin', $emplgid)
        ->update(['lgstatus' => 1]);

        return response()->json(['status'=>'2','success'=>'Record is successfully Updated']);

    }
    public function updateEmpStatDeactive(Request $request)
    {
       $validator = \Validator::make($request->all(), [
            'emplgid' =>  'required|exists:login,idlogin',
            'empid' => 'required|exists:employee,employeeId',
            'adid' => 'required|exists:login,idlogin,idlogin,1',
        ],
         [             
             'emplgid.required' => 'Employee login ID is Missing .',
             'empid.required' => 'Employee ID is Missing .',
             'empid.exists' => 'Not Exist this Employee.',
             'emplgid.exists' => 'Not Exist this Employee Login.',
             'adid.required' => 'Admin is not Login.',
             'adid.exists' => 'You have no access to do this.',
             
         ]);
        
        if ($validator->fails())
        {
            return response()->json(['status'=>'1','errors'=>$validator->errors()->all()]);
        }

        $empid = $request->empid;
        $emplgid = $request->emplgid;

        DB::table('employee')
        ->where('employeeId', $empid)
        ->update(['status' => 0]);

        DB::table('login')
        ->where('idlogin', $emplgid)
        ->update(['lgstatus' => 0]);

        return response()->json(['status'=>'2','success'=>'Record is successfully Updated']);

    }

}
