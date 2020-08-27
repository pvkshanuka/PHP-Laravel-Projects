<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;
use DateInterval;
use Carbon\Carbon;
use Session;

class MonthlyLoanController extends Controller
{
    public function monthlyLoanPCreate(Request $request){
        $empid = $request->session()->get('empid');
        $abc = $request->paymethod;
        $guranterindex = $request->guranterindex;
        $loanid = $request->loanid;
        $today  = Carbon::parse($request->fdate);
        $opendate = $today->format('Y-m-d');

           $gid =[];
        $gid = $request->gids;
        // datefmt
        if ($request->interstcheck=='true') {
          
          
                # cash...
               
                
                $data1 = array();
                $data1['amount'] = $request->loanamount;
                $data1['custom_loanId'] = $loanid;
                $data1['idcustomer'] = $request->cid;
                $data1['rate'] = $request->loaninterst;
                $data1['takenDate'] = $today;
                $data1['paidAmount'] = 0;
                $data1['status'] = 2;
                $data1['completeStatus'] = 1;
                $data1['loanTypeId'] = 3;
                $loan =  DB::table('loan')->insertGetId($data1);

                $data2 = array();
                $amount = $request->loanamount;
                $rate= $request->loaninterst;
                $interst = $amount/100*$rate;
                $data2['amount'] = $interst;
                $data2['paidAmount'] =  $interst;
                $data2['datec'] = $today;
                $data2['loanId'] = $loan;
                $data2['status'] = 0;

               $intrst =  DB::table('interest')->insertGetId($data2);

               $data3 = array();
               $data3['paidAmount'] = $interst;
               $data3['datec'] = $today;
               $data3['status'] = 0;
               $data3['interestId'] = $intrst;
               $data3['employeeId'] = $empid;

               DB::table('interestpay')->insert($data3);

               $data6 = array();
               $today->addMonth();
            $date = $today->format('Y-m-d');
            $data6['amount'] = $interst;
                $data6['paidAmount'] =  0;
                $data6['datec'] = $today;
                $data6['loanId'] = $loan;
                $data6['status'] = 1;
                DB::table('interest')->insert($data6);


               
                // return response()->json($request);
        if ($request->paymethod==2) {
                # cheque...

                if ($request->checknum!="" && $request->chequedate!="") {
                   
                    $empid = $request->session()->get('empid');
                   $newAmount = $amount-$interst;
                   $cusname = $request->cname;
                   $cusnic = $request->nic;
                    $data3 = array();
                    $data3['checkNo'] = $request->checknum;
                    $data3['realizeDate'] = $request->chequedate;
                    $data3['accountId'] = $request->accno;
                    $data3['description'] = 'Paid for loan,customer Loanid :'.$loanid ;
                    $data3['issueDate'] =$today;
                    $data3['amount'] =$newAmount;
                    $data3['status'] =1;
                    $data3['marked'] =1;
                    $data3['employeeId'] =$empid;
                    $data3['loanId'] =$loan;
                    DB::table('chequetransactions')->insert($data3);
                    return response()->json(['status'=>'2','success'=>'Loan Create successfully added....']);
                }else{
                    return response()->json(['status'=>'1','success'=>'Invalid Details.....']);
                }
                
            }

            if ($guranterindex==1) {
                $insertguarantors =[];
                for ($b = 1; $b < count($gid); $b++) {
               
                $insertguarantors['guarantorId']=$gid[$b];
                $insertguarantors['datec']=$today;
                $insertguarantors['loanId']=$loan;
                $insertguarantors['status']=1;
                DB::table('guarantorloan')->insert($insertguarantors);
                }
            }

            // return response()->json(['status'=>'2','success'=>'Loan Create successfully added....']);
            return response()->json($request);

        }else if ($request->interstcheck=='false') {
         

        
           
                # cash...
               
                $data1 = array();
                $data1['amount'] = $request->loanamount;
                $data1['custom_loanId'] = $loanid;
                $data1['idcustomer'] = $request->cid;
                $data1['rate'] = $request->loaninterst;
                $data1['takenDate'] = $today;
                $data1['paidAmount'] = 0;
                $data1['status'] = 2;
                $data1['completeStatus'] = 1;
                $data1['loanTypeId'] = 3;
                $loan =  DB::table('loan')->insertGetId($data1);

                $data2 = array();
                $amount = $request->loanamount;
                $rate= $request->loaninterst;
                $interst = $amount/100*$rate;
                $data2['amount'] = $interst;
                $data2['paidAmount'] = 0;
                $data2['loanId'] = $loan;
                $data2['status'] = 1;
                $data2['datec'] =  $request->date;

                DB::table('interest')->insert($data2);

                if ($guranterindex==1) {
                    $insertguarantors =[];
                    for ($b = 1; $b < count($gid); $b++) {
                   
                    $insertguarantors['guarantorId']=$gid[$b];
                    $insertguarantors['datec']=$today;
                    $insertguarantors['loanId']=$loan;
                    $insertguarantors['status']=1;
                    DB::table('guarantorloan')->insert($insertguarantors);
                    }
                }
            if ($request->paymethod==2) {
                # cheque...

                if ($request->checknum!="" && $request->chequedate!="") {
                   
                    $empid = $request->session()->get('empid');
                   $newAmount = $amount-$interst;
                   $cusname = $request->cname;
            $cusnic = $request->nic;
                    $data3 = array();
                    $data3['checkNo'] = $request->checknum;
                    $data3['realizeDate'] = $request->chequedate;
                    $data3['accountId'] = $request->accno;
                    $data3['description'] = 'Paid for loan,customer Loanid :'.$loanid ;
                    $data3['issueDate'] =$today;
                    $data3['amount'] =$newAmount;
                    $data3['status'] =2;
                    $data3['marked'] =1;
                    $data3['employeeId'] =$empid;
                    $data3['loanId'] =$loan;
                    DB::table('chequetransactions')->insert($data3);



                    return response()->json(['status'=>'2','success'=>'Loan Create successfully added....']);
                }else{
                    return response()->json(['status'=>'1','success'=>'Invalid Details.....']);
                }
                
            }

        }
        return response()->json($request);
    }





    public function propertyAndvehicalLoan(Request $request){


        
        $cusid = $request->cid;
        $end = $request->monthlyendDate;
        $type = $request->loantype;
        $opendate = Carbon::parse($request->cdate);
        $datefmt = $opendate->format('Y-m-d');
        $loanamount = $request->amount;
        $loanreamount = $request->reamount1;
        $datecount = $request->count;
        $interst = $request->interst;
        $income = $loanamount/100 * $interst;
        $method = $request->paymethod;
        $loanid = $request->loanid;
        $guranterindex = $request->guranterindex;
        $loandetails = [];

        $loandetails['takenDate'] = $datefmt;
        $loandetails['custom_loanId'] = $loanid;
        $loandetails['endDate'] = $end;
        $loandetails['loanTypeId'] = $type;
        $loandetails['idcustomer'] = $cusid;
        $loandetails['rate'] = $interst;
        $loandetails['status'] = '2';
        $loandetails['amount'] = $loanamount;
        $loandetails['paidAmount'] = '0';
        $loandetails['completeStatus'] = '1';
        $loandetails['targetIncome'] = $income;

        $loanid = DB::table('loan')->insertGetId($loandetails);

        $installment = [];
        $installmentdata = [];
        $dateplan = [];

        $dateplan = $request->plan;
            $newAmount = ($loanamount + $income)/$datecount;
        for ($a = 0; $a < count($dateplan); $a++) {
            $installment['amount'] = $loanreamount;
            $installment['datec'] = $dateplan[$a];
            $installment['status'] = '0';
            $installment['loanId'] = $loanid;
            $installment['paidAmount'] = '0';

            array_push($installmentdata, $installment);
        }

        DB::table('installment')->insert($installmentdata);
        if ($method == '2') {
            //cheque

            $chequno = $request->chequeno;
            $accid = $request->accid;
            $chequedate = $request->date;
            $cusname = $request->cname;
            $cusnic = $request->nic;
            $empid = $request->session()->get('empid');

            $checktransaction = [];

            $checktransaction['checkNo'] = $chequno;
            $checktransaction['issueDate'] = $datefmt;
            $checktransaction['description'] = 'Paid for loan,customer Loanid :'.$loanid ;
            $checktransaction['realizeDate'] = $chequedate;
            $checktransaction['loanId'] = $loanid;
            $checktransaction['accountId'] = $accid;
            $checktransaction['employeeId'] = $empid;
            $checktransaction['status'] = '1';
            $checktransaction['marked'] = '1';
            $checktransaction['amount'] = $loanamount;

            DB::table('chequetransactions')->insert($checktransaction);
        }
        if ($guranterindex==1) {
            $insertguarantors =[];
            for ($b = 1; $b < count($gid); $b++) {
           
            $insertguarantors['guarantorId']=$gid[$b];
            $insertguarantors['datec']=$today;
            $insertguarantors['loanId']=$loan;
            $insertguarantors['status']=1;
            DB::table('guarantorloan')->insert($insertguarantors);
            }
        }
        return response()->json($loanreamount);
    }
    public function vehicalLoanPlan(Request $request){
        
        $datelist = [];

        $monthlyAmount = $request->monthlyamount;
        $count = $request->count1;

        $today =  Carbon::parse($request->cdate);

        for ($i = 0; $count > $i; $i++) {
            $today->addMonth();
            $date = $today->format('Y-m-d');

            $datelist[$i] = $date;
        }

        return response()->json($datelist);
    }

    

    
}
