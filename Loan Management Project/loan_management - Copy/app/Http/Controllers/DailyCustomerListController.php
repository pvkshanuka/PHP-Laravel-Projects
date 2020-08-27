<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DailyCustomerListController extends Controller
{
    //
    
    public function loadLoanListofRoutecc(Request $request)
    {
        // $routeid = $request->input('routeid');
        $routeid = 19;// this id will come from mobile
        
        $value = DB::table('customer')
        ->join('loan', 'loan.idcustomer', '=', 'customer.idcustomer')
        ->where('customer.routeId', $routeid)
        ->where('loan.loanTypeId', '1')
        ->where('loan.status', '1')
        ->select('customer.name as cusname','customer.nic as cusnic','customer.img as cusimg','loan.loanId as loanId') 
        ->get();
        
        //this will return the loan list of specific route
        
        return response()->json(['status'=>$value]);
        
    }
    
    public function loadLoanDetails(Request $request)
    {
        $loanid = 19;
        
        $value = DB::table('loan')
        ->join('installment', 'loan.loanId', '=', 'installment.loanId')
        ->join('customer', 'loan.idcustomer', '=', 'customer.idcustomer')
        ->where('loan.loanId', $loanid)
        ->select('customer.name as cusname','customer.nic as cusnic','customer.img as cusimg','loan.loanId as loanId','loan.amount as loanamount','loan.takenDate as loantakenDate','loan.endDate as loanendDate','installment.*')   
        ->get();
        
        //this will return the installments of specific loan
        
        return response()->json(['status'=>$value]);
        
    }
    
    public function makepaymentforLoan(Request $request)
    {
        $empid = 21;
        $loanid = 4;
        $ccid = 4;
        $lnpaidamountott = 4000;
        $inscountpaid = 3;
        $insamount = 1200;
        $today = \Carbon\Carbon::now();
        
        $value = DB::table('installment')
        ->where('loanId', $loanid)
        ->where('status', '0')
        ->orderBy('datec', 'asc')
        ->skip(0)->take($inscountpaid)  
        ->get();
        
        $count = count($value, COUNT_RECURSIVE);
        
        if($count>$inscountpaid){
            // payment can be made count >
            foreach($value as $lst){
                
                $data = array();
                $data['status'] = 1;
                
                DB::table('installment')
                ->where('installmentId',$lst->installmentId)
                ->update($data);
                
                $data2 = array();
                $data2['installmentId'] = $lst->installmentId;
                $data2['employeeId'] = $empid;
                $data2['datec'] = $today;
                $data2['amount'] = $insamount;
                $data2['status'] = 1;
                DB::table('installmentpay')->insert($data2);
                
            }
            //sms api code need to be proceed
            
            return response()->json(['status'=>'1']);
        }else if($count==$inscountpaid){
            // payment can be made count =
            foreach($value as $lst){
                
                $data = array();
                $data['status'] = 1;
                
                DB::table('installment')
                ->where('installmentId',$lst->installmentId)
                ->update($data);
                
                $data2 = array();
                $data2['installmentId'] = $lst->installmentId;
                $data2['employeeId'] = $empid;
                $data2['datec'] = $today;
                $data2['amount'] = $insamount;
                $data2['status'] = 1;
                DB::table('installmentpay')->insert($data2);
                
            }
            
            $data3 = array();
            $data3['status'] = 6;
            DB::table('loan')
            ->where('loanId',$loanid)
            ->update($data3);

            //sms api code need to be proceed
            
            return response()->json(['status'=>'2']);
        }else {
            // payment can't be made
            return response()->json(['status'=>'3']);
            
        }
        
        // status - 1 payment successfull
        // status - 2 payment successfull and loan is overed
        // status - 3 payment can't be made because installment count is execed
        
        
    }
    
    
}
