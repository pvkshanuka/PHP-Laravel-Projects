<?php

namespace App\Http\Controllers;

use App\Login;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    
    public function userLogin(Request $request)
    {
        $this->validate($request,['username'=>'required','password'=>'required']);
        $error_msg = 'invalid UserName or Password';
        
        
        $user = DB::table('login')->where('username',$request->username)->get();
        
        if (Crypt::decrypt($user[0]->password)==$request->password) {
            
            $empid = DB::table('employee')->where('idlogin',$user[0]->idlogin)->get();
            
            $request->session()->put('user',$request->username);
            $request->session()->put('empid',$empid[0]->employeeId);
            $request->session()->put('emptype',$empid[0]->employeeTypeId);
            return view('dashboard');
            
        }else{
            
            return view('login')->with('error_msg',$error_msg);
        }
    }
    
    public function newStaffMember(Request $request)
    {
        
        $validator = \Validator::make($request->all(), [
            'empname' => 'required',
            'empnic' => 'required|unique:employee,nic',
            'emptp' => 'required|size:10|regex:/(07)[0-9]{8}/',
            'empadd1' => 'required',
            'empadd2' => 'required',
            'empcity' => 'required',
            'empuname' => 'required|unique:login,username',
            'emppw1' => 'required|confirmed|min:6',
        ],
        [
            'empname.required' => 'The Employee Name field is required.',
            'empnic.required' => 'The Employee NIC field is required.',
            'empnic.unique' => 'This Employee NIC is already registered.',
            'empemail.required' => 'The Employee Email field is required.',
            'empemail.email' => 'Please enter valid email.',
            'empemail.unique' => 'email is already taken.',
            'emptp.required' => 'The Employee Mobile field is required.',
            'emptp.size' => 'Please enter valid Mobile.',
            'emptp.regex' => 'Please enter valid Mobile.',
            'empadd1.required' => 'The Employee Address 1 field is required.',
            'empadd2.required' => 'The Employee Address 2 field is required.',
            'empcity.required' => 'The Employee City field is required.',
            'empuname.required' => 'The Employee UserName field is required.',
            'empuname.unique' => 'User Name is already taken.',
            'emppw1.required' => 'The Employee Password field is required.',
            'emppw1.confirmed' => 'The password does not match with confirmation password .',
            'emppw1.min' => 'The password character count is too short .',
            
            ]);
            
            if ($validator->fails())
            {
                error_log('Some message here.');
                return response()->json(['status'=>'1','errors'=>$validator->errors()->all()]);
            }
            // status  = 0 active
            
            $data1 = array();
            $data1['line1'] = $request->empadd1;
            $data1['line2'] = $request->empadd2;
            $data1['city'] = $request->empcity;
            $data1['status'] = $request->status;
            
            
            $address =  DB::table('address')->insertGetId($data1);
            
            $data2 = array();
            $data2['name'] = $request->empname;
            $data2['username'] = $request->empuname;
            $data2['password'] = Crypt::encrypt($request->emppw1);
            $data2['lgstatus'] = $request->status;
            $login =  DB::table('login')->insertGetId($data2);
            
            $data = array();
            $data['employeeTypeId'] = '3';
            $data['nic'] = $request->empnic;
            $data['name'] = $request->empname;
            $data['pno'] = $request->emptp;
            $data['addressId'] = $address;
            $data['email'] =  $request->empemail;
            $data['idlogin'] =  $login;
            
            $data['status'] = $request->status;
            DB::table('employee')->insert($data);
            
            return response()->json(['status'=>'2','success'=>'Record is successfully added']);
            
        }
        
        public function loadEmployeeDetails(Request $request)
        {
            $type = $request->ccid;
            $value = DB::table('employee')
            ->join('address', 'address.addressId', '=', 'employee.addressId')
            ->join('login', 'login.idlogin', '=', 'employee.idlogin')        
            ->where('employeeId', $type)->get();
            return view("empdetailsmodelbdy")->with("ccmodel", $value);
        }
        
        public function updateEmployeeDetails(Request $request)
        {
            $validator = \Validator::make($request->all(), [
                'ccname' => 'required',
                'ccnic' => 'required',
                'ccmob' => 'required|size:10|regex:/(07)[0-9]{8}/',
                'ccmail' => 'required|email:rfc,dns',
                'ccadd1' => 'required',
                'ccadd2' => 'required',
                'cccity' => 'required',
            ],
            [
                'ccname.required' => 'Employee Name field is required.',
                'ccnic.required' => 'Employee NIC field is required.',
                'ccmob.required' => 'Employee Mobile field is required.',
                'ccmob.size' => 'Please enter valid Mobile.',
                'ccmob.regex' => 'Please enter valid Mobile.',
                'ccmail.required' => 'The Employee Email field is required.',
                'ccmail.email' => 'Please enter valid email.',
                'ccadd1.required' => 'Employee Address 1 field is required.',
                'ccadd2.required' => 'Employee Address 2 field is required.',
                'cccity.required' => 'Employee City field is required.',
                
                ]);
                
                if ($validator->fails())
                {
                    error_log('Some message here.');
                    return response()->json(['status'=>'1','errors'=>$validator->errors()->all()]);
                }
                
                $ccid = $request->ccid;
                $data = array();
                $data['nic'] = $request->ccnic;
                $data['name'] = $request->ccname;
                $data['pno'] = $request->ccmob;
                $data['email'] = $request->ccmail;
                
                DB::table('employee')
                ->where('employeeId',$ccid)
                ->update($data);
                
                $date1 = array();
                $adid = $request->ccadid;
                $data1['line1'] = $request->ccadd1;
                $data1['line2'] = $request->ccadd2;
                $data1['city'] = $request->cccity;
                DB::table('address')
                ->where('addressId',$adid)
                ->update($data1);
                
                // return response()->json($data);
                return response()->json(['status'=>'2','success'=>'Record is successfully added']);
            }
            
            public function updateEMPCredintial(Request $request)
            {
                
                $validator = \Validator::make($request->all(), [
                    'ccpw1' => 'required|confirmed|min:6',
                    'ccotp' => 'required|exists:login,otp',
                ],
                [             
                    'ccpw1.required' => 'Employee Password field is required.',
                    'ccpw1.confirmed' => 'The password does not match with confirmation password .',
                    'ccpw1.min' => 'The password does not match with confirmation password .',
                    'ccotp.required' => 'Please entered valid OTP .',
                    'ccotp.exists' => 'Entered OTP is incorrect.',
                    
                    ]);
                    
                    if ($validator->fails())
                    {
                        error_log('Some message here.');
                        return response()->json(['status'=>'1','errors'=>$validator->errors()->all()]);
                    }
                    
                    
                    $cclid = $request->cclgid;
                    $data = array();
                    $data['password'] = $request->ccpw1;
                    
                    DB::table('login')
                    ->where('idlogin',$cclid)
                    ->update($data);
                    
                    return response()->json(['status'=>'2','success'=>'Record is successfully added']);
                    
                }
                
                public function newCashCollector(Request $request)
                {
                    //status 1 is active
                    
                    $validator = \Validator::make($request->all(), [
                        'ccname' => 'required',
                        'ccnic' => 'required|unique:employee,nic',
                        'ccmob' => 'required|size:10|regex:/(07)[0-9]{8}/',
                        'ccadd1' => 'required',
                        'ccadd2' => 'required',
                        'cccity' => 'required',
                        'ccdetails' => 'nullable',
                        'ccuname' => 'required|unique:login,username',
                        'ccpw1' => 'required|confirmed|min:6',
                    ],
                    [
                        'ccname.required' => 'The Cash Collector Name field is required.',
                        'ccnic.required' => 'The Cash Collector NIC field is required.',
                        'ccnic.unique' => 'This Cash Collector NIC is already registered.',
                        'ccmob.required' => 'The Cash Collector Mobile field is required.',
                        'ccmob.size' => 'Please enter valid Mobile.',
                        'ccmob.regex' => 'Please enter valid Mobile.',
                        'ccadd1.required' => 'The Cash Collector Address 1 field is required.',
                        'ccadd2.required' => 'The Cash Collector Address 2 field is required.',
                        'cccity.required' => 'The Cash Collector City field is required.',
                        'ccuname.required' => 'The Cash Collector UserName field is required.',
                        'ccuname.unique' => 'User Name is already taken.',
                        'ccpw1.required' => 'The Cash Collector Password field is required.',
                        'ccpw1.confirmed' => 'The password does not match with confirmation password .',
                        'ccpw1.min' => 'The password character count is too short .',
                        
                        ]);
                        
                        if ($validator->fails())
                        {
                            error_log('Some message here.');
                            return response()->json(['status'=>'1','errors'=>$validator->errors()->all()]);
                        }
                        
                        $date1 = array();
                        $data1['line1'] = $request->ccadd1;
                        $data1['line2'] = $request->ccadd2;
                        $data1['city'] = $request->cccity;
                        $data1['status'] = $request->status;
                        
                        
                        $address =  DB::table('address')->insertGetId($data1);
                        
                        $data2 = array();
                        $data2['name'] = $request->ccname;
                        $data2['username'] = $request->ccuname;
                        $data2['password'] =Crypt::encrypt($request->ccpw1); 
                        $data2['lgstatus'] = $request->status;
                        $login =  DB::table('login')->insertGetId($data2);
                        
                        $data = array();
                        $data['employeeTypeId'] = '4';
                        $data['nic'] = $request->ccnic;
                        $data['name'] = $request->ccname;
                        $data['pno'] = $request->ccmob;
                        $data['addressId'] = $address;
                        $data['idlogin'] =  $login;
                        
                        $data['status'] = $request->status;
                        $collectorid = DB::table('employee')->insertGetId($data);
                        
                        $data3 = array();
                        $data3['note'] = $request->ccdetails;
                        $data3['status'] = $request->status;
                        $data3['employeeId'] = $collectorid;
                        DB::table('collector')->insert($data3);
                        return response()->json(['status'=>'2','success'=>'Record is successfully added']);
                        
                    }
                    
                    public function loadCashCollectorDetails(Request $request)
                    {
                        $type = $request->ccid;
                        $value = DB::table('employee')
                        ->join('address', 'address.addressId', '=', 'employee.addressId')
                        ->join('login', 'login.idlogin', '=', 'employee.idlogin')        
                        ->where('employeeId', $type)->get();
                        return view("ccview")->with("ccmodel", $value);
                    }
                    
                    public function loadCashCollectorNote(Request $request)
                    {
                        $type = $request->ccid;
                        $value = DB::table('collector')
                        ->where('employeeId', $type)->get();
                        return view("ccviewnote")->with("ccmodel", $value);
                    }
                    public function updateCashCollectorDetails(Request $request)
                    {
                        $validator = \Validator::make($request->all(), [
                            'ccname' => 'required',
                            'ccnic' => 'required',
                            'ccmob' => 'required|size:10|regex:/(07)[0-9]{8}/',
                            'ccadd1' => 'required',
                            'ccadd2' => 'required',
                            'cccity' => 'required',
                        ],
                        [
                            'ccname.required' => 'The Cash Collector Name field is required.',
                            'ccnic.required' => 'The Cash Collector NIC field is required.',
                            'ccmob.required' => 'The Cash Collector Mobile field is required.',
                            'ccmob.size' => 'Please enter valid Mobile.',
                            'ccmob.regex' => 'Please enter valid Mobile.',
                            'ccadd1.required' => 'The Cash Collector Address 1 field is required.',
                            'ccadd2.required' => 'The Cash Collector Address 2 field is required.',
                            'cccity.required' => 'The Cash Collector City field is required.',
                            
                            ]);
                            
                            if ($validator->fails())
                            {
                                error_log('Some message here.');
                                return response()->json(['status'=>'1','errors'=>$validator->errors()->all()]);
                            }
                            
                            $ccid = $request->ccid;
                            $data = array();
                            $data['nic'] = $request->ccnic;
                            $data['name'] = $request->ccname;
                            $data['pno'] = $request->ccmob;
                            
                            DB::table('employee')
                            ->where('employeeId',$ccid)
                            ->update($data);
                            //   DB::update('update employee set name=?,nic=?,pno=? where employeeId = ?',[$cname, $cnic,$cpno, $ccid]);
                            
                            $date1 = array();
                            $adid = $request->ccadid;
                            $data1['line1'] = $request->ccadd1;
                            $data1['line2'] = $request->ccadd2;
                            $data1['city'] = $request->cccity;
                            DB::table('address')
                            ->where('addressId',$adid)
                            ->update($data1);
                            
                            // return response()->json($data);
                            return response()->json(['status'=>'2','success'=>'Record is successfully added']);
                        }
                        
                        public function updateCashCollectorNote(Request $request)
                        {
                            $ccnote = $request->ccnote;
                            $ccid = $request->ccid;
                            
                            DB::table('collector')
                            ->where('idcollector', $ccid)
                            ->update(['note' => $ccnote]);
                            return response()->json(['status'=>'2','success'=>'Record is successfully Updated']);
                            
                            $value = DB::select('select * from employee  where employeeId=? ', [$type]);
                            // $value = table('employee')->where('nemployeeIdame', '[$type]')->get();
                            return view("ccview")->with("ccmodel", $value);
                        }
                        public function updateCCCredintial(Request $request)
                        {
                            
                            $validator = \Validator::make($request->all(), [
                                'ccpw1' => 'required|confirmed|min:6',
                                'ccotp' => 'required|exists:login,otp',
                            ],
                            [             
                                'ccpw1.required' => 'The Cash Collector Password field is required.',
                                'ccpw1.confirmed' => 'The password does not match with confirmation password .',
                                'ccpw1.min' => 'The password does not match with confirmation password .',
                                'ccotp.required' => 'Please entered valid OTP .',
                                'ccotp.exists' => 'Entered OTP is incorrect.',
                                
                                ]);
                                
                                if ($validator->fails())
                                {
                                    error_log('Some message here.');
                                    return response()->json(['status'=>'1','errors'=>$validator->errors()->all()]);
                                }
                                
                                
                                $cclid = $request->cclgid;
                                $data = array();
                                $data['password'] = $request->ccpw1;
                                
                                DB::table('login')
                                ->where('idlogin',$cclid)
                                ->update($data);
                                
                                return response()->json(['status'=>'2','success'=>'Record is successfully added']);
                                
                            }
                            
                            public function TestMethodPagination(Request $request)
                            {
                                $users = DB::table('employee')->simplePaginate(3);
                                
                                return view("ccview")->with("ccmodel", $value);
                                
                            }
                            
                            
                        }
                        