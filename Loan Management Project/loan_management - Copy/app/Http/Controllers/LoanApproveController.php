<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoanApproveController extends Controller
{
    //
    
    public function loadCustomerInfo(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'ccid' => 'required|exists:customer,idcustomer',
        ],
        [
            'ccid.required' => 'Customer ID is required',
            'ccid.exists' => 'There is no Customer from this id',
            
            ]);
            
            if ($validator->fails())
            {
                error_log('Some message here.');
                return response()->json(['status'=>'1','errors'=>$validator->errors()->all()]);
            }
            
            $type = $request->ccid;
            $value = DB::table('customer')  
            ->where('customer.idcustomer', $type)
            ->select('customer.name as cusname','customer.nic as nic','customer.pno as pno','customer.img as cusimg','customer.pno as pno','customer.routeId as routeId','customer.customerLevelId as customerLevelId')
            ->get();
            
            $check = DB::table('loan')  
            ->where('loan.idcustomer', $type)
            ->select('loan.amount as amount','loan.takenDate as takenDate','loan.endDate as endDate','loan.status as loanstatus')
            ->get();
            
            $returndata = '{"smry": '.$value.',"entryhistory": '.$check.'}';
            return view("modelciaproveloan")->with("cshsmry", json_decode($returndata,true));
            // return response()->json(['status'=>$value]);
            
        }
        
        public function loadLoanInfoApprove(Request $request)
        {
            $validator = \Validator::make($request->all(), [
                'lnid' => 'required|exists:loan,loanId',
                'lntypid' => 'required|exists:loantype,loanTypeId',
            ],
            [
                'lnid.required' => 'Loan ID is required',
                'lnid.exists' => 'There is no Loan from this id',
                'lntypid.required' => 'Loan type ID is required',
                'lntypid.exists' => 'There is no Loan type from this id',
                
                ]);
                
                if ($validator->fails())
                {
                    error_log('Some message here.');
                    return response()->json(['status'=>'1','errors'=>$validator->errors()->all()]);
                }
                
                if($request->lntypid == 3 || $request->lntypid == 6 )
                {
                    //interest table
                    $check = DB::table('loan')
                    ->join('interest','interest.loanId','=','loan.loanId')  
                    ->where('loan.loanId', $request->lnid)
                    ->select('loan.amount as lnamount','loan.takenDate as takenDate','loan.loanTypeId as loanTypeId','interest.amount as inamount')
                    // ->select('installment.amount as amountins','installment.paidAmount as paidAmountins','installment.datec as datec','installment.status as statusins','installment.loanId as loanId','customer.nic as nic','customer.name as name')  
                    ->first();
                    
                    
                }else{
                    //instalment table
                    $check = DB::table('loan')
                    ->join('installment','installment.loanId','=','loan.loanId')  
                    ->where('loan.loanId', $request->lnid)
                    ->select('loan.amount as lnamount','loan.takenDate as takenDate','loan.loanTypeId as loanTypeId','installment.amount as inamount')
                    ->first();
                    
                }
                
                return response()->json(['status'=>$check]);
                // return view("modelciaproveloan")->with("cshsmry",$check);
                // return view("modelaprvlninfo")->with("ccmodel", $check);
                
            }
            public function approveLoanAdmin(Request $request)
            {
                
                $loanid= 1;//admin id should be replace
                $validator = \Validator::make($request->all(), [
                    'lnid' => 'required|exists:loan,loanId',
                ],
                [
                    'lnid.required' => 'Loan ID is required',
                    'lnid.exists' => 'There is no Loan from this id',
                    
                    ]);
                    
                    if ($validator->fails())
                    {
                        error_log('Some message here.');
                        return response()->json(['status'=>'1','errors'=>$validator->errors()->all()]);
                    }
                    
                    $lnid = $request->lnid;
                    $data = array();
                    $data['status'] = 1;
                    
                    DB::table('loan')
                    ->where('loanId',$lnid)
                    ->update($data);
                    
                    return response()->json(['status'=>'2','success'=>'Record is successfully added']);
                    
                    
            }

            public function notApproveLoanAdmin(Request $request)
            {
                
                $loanid= 1;//admin id should be replace
                $validator = \Validator::make($request->all(), [
                    'lnid' => 'required|exists:loan,loanId',
                ],
                [
                    'lnid.required' => 'Loan ID is required',
                    'lnid.exists' => 'There is no Loan from this id',
                    
                    ]);
                    
                    if ($validator->fails())
                    {
                        error_log('Some message here.');
                        return response()->json(['status'=>'1','errors'=>$validator->errors()->all()]);
                    }
                    
                    $lnid = $request->lnid;
                    $data = array();
                    $data['status'] = 4;
                    
                    DB::table('loan')
                    ->where('loanId',$lnid)
                    ->update($data);
                    
                    return response()->json(['status'=>'2','success'=>'Record is successfully added']);
                    
                    
            }
                
}
            