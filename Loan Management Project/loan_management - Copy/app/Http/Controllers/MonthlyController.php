<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;
use DateInterval;
use Carbon\Carbon;

class MonthlyController extends Controller
{
    public function monthlyloanPlan(Request $request)
    {
        $datelist = [];

         $monthlyAmount1 = $request->monthlyamount;
        $count1 = $request->count;

    
        $today =  Carbon::parse($request->cdate);

        for ($i = 0; $count1 > $i; $i++) {
            $today->addMonth();
            $date = $today->format('Y-m-d');

            $datelist[$i] = $date;
        }

        return response()->json($datelist);
    }

    public function createMonthlyLoan(Request $request)
    {
        $empid = $request->session()->get('empid');
        $cusid = $request->cid;
        $end = $request->monthlyendDate;
        $type = $request->loantype;
        $guranterindex = $request->guranterindex;
        $opendate = Carbon::parse($request->cdate);
        $datefmt = $opendate->format('Y-m-d');
        $monthlyamount = $request->dailyamount;
        $loanamount = $request->amount;
        $datecount = $request->count;
        $income = $monthlyamount * $datecount - $loanamount;
        $method = $request->paymethod;
        $loanid = $request->loanid;

        $loandetails = [];

        $loandetails['takenDate'] = $datefmt;
        $loandetails['custom_loanId'] = $loanid;
        $loandetails['endDate'] = $end;
        $loandetails['loanTypeId'] = $type;
        $loandetails['idcustomer'] = $cusid;
        $loandetails['status'] = '2';
        $loandetails['amount'] = $loanamount;
        $loandetails['paidAmount'] = '0';
        $loandetails['targetIncome'] = $income;

        $loanid = DB::table('loan')->insertGetId($loandetails);

        $installment = [];
        $installmentdata = [];
        $dateplan = [];

        $dateplan = $request->plan;

        for ($a = 0; $a < count($dateplan); $a++) {
            $installment['amount'] = $monthlyamount;
            $installment['datec'] = $dateplan[$a];
            $installment['status'] = '0';
            $installment['loanId'] = $loanid;
            $installment['paidAmount'] = '0';

            array_push($installmentdata, $installment);
        }

        DB::table('installment')->insert($installmentdata);
        $checktransaction = [];
        if ($method == '2') {
            //cheque

            $chequno = $request->chequeno;
            $accid = $request->accid;
            $chequedate = $request->date;
          
            $cusname = $request->cname;
            $cusnic = $request->nic;

           

            $checktransaction['checkNo'] = $chequno;
            $loandetails['custom_loanId'] = $loanid;
            $checktransaction['issueDate'] = $datefmt;
            $checktransaction['realizeDate'] = $chequedate;
            $checktransaction['loanId'] = $loanid;
            $data3['description'] = 'Paid for loan,customer Loanid :'.$loanid ;
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

        return response()->json($request);
    }
}
