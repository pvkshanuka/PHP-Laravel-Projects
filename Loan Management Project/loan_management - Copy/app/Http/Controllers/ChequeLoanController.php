<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;
use DateInterval;

class ChequeLoanController extends Controller
{
    public function chequeLoneCreate(Request $request)
    {
    
         $gid =[];
        $gid = $request->Guarantorid;
        $hvguarantor=$request->hvguarantor;
        $CCreatedate = $request->CCreatedate;
        $loanid = $request->loanid;
        $cusid = $request->cid;
        $empid = $request->session()->get('empid');
        $type = $request->loantype;
        $paymethod =$request->pay_method;

        $opendate = \Carbon\Carbon::now();
        $datefmt = $opendate->format('Y-m-d');

        $Camount = $request->Camount;
        $Cprofit = $request->Cprofit;
        $Cinterest = $request->Cinterest;

        $Cnum4us = $request->Cnum4us;
        $Cbank4us = $request->Cbank4us;
        $Cdate4us = $request->Cdate4us;

        $CnumFromus = $request->CnumFromus;
        $CaccNoFromus = $request->CaccNoFromus;
        // $BankAccount = DB::table('bankaccount')->where('accNumber',$CaccNoFromus)->get();
        // $CaccId=$BankAccount->accountId;
        $CdateFromus = $request->CdateFromus;

        

        $loandetails = [];

        $loandetails['custom_loanId'] = $loanid;
        // $loandetails['takenDate'] = $datefmt;
         $loandetails['takenDate'] = $CCreatedate;
        $loandetails['rate'] =  $Cinterest;
        $loandetails['loanTypeId'] = $type;
        $loandetails['idcustomer'] = $cusid;
        $loandetails['status'] = '1';
        $loandetails['completeStatus'] = '0';
        $loandetails['amount'] = $Camount;
        $loandetails['paidAmount'] = '0';
        $loandetails['targetIncome'] = $Cprofit;

        $loanid = DB::table('loan')->insertGetId($loandetails);

        $chequedetails = [];

       
        $chequedetails['bankName'] = $Cbank4us;
        $chequedetails['checkNo'] =  $Cnum4us;
        $chequedetails['datec'] = $datefmt;
        $chequedetails['realizeDate'] = $Cdate4us;

        $Customer = DB::table('customer')->where('idcustomer',$cusid)->get();
       
       $cusName=$Customer[0]->name;
       $cusNic =$Customer[0]->nic;
       $cusRegNo =$Customer[0]->customerNo;
       $cusDetails ="name:".$cusName."  nic:".$cusNic."  customerNo:".$cusRegNo;

        $chequedetails['description'] = $cusDetails;
        $chequedetails['status'] = '1';
        $chequedetails['loanId'] = $loanid;

        DB::table('checkdetails')->insert($chequedetails);

        $intrestdetails = [];

        $intrestdetails['amount'] = $Camount;
        $intrestdetails['paidAmount'] = $Cprofit;
        // $intrestdetails['datec'] = $datefmt;
        $intrestdetails['datec'] = $CCreatedate;;
        $intrestdetails['status'] = '1';
        $intrestdetails['loanId'] = $loanid;

        DB::table('interest')->insert($intrestdetails);


        if($hvguarantor==1){
        $insertguarantors =[];
        for ($b = 1; $b < count($gid); $b++) {
       
        $insertguarantors['guarantorId']=$gid[$b];
        // $insertguarantors['datec']=$datefmt;
        $insertguarantors['datec']=$CCreatedate;
        $insertguarantors['loanId']=$loanid;
        $insertguarantors['status']=1;
        DB::table('guarantorloan')->insert($insertguarantors);
        }
    }





        if($paymethod==2){
            $chequetransaction = [];
            $chequetransaction['checkNo'] =  $CnumFromus;
            $chequetransaction['issueDate'] = $datefmt;
            $chequetransaction['realizeDate'] = $CdateFromus;
            $chequetransaction['description'] = "sample";
            $chequetransaction['status'] = '1';
            $chequetransaction['marked'] = '1';
            $chequetransaction['amount'] = $Camount;
            $chequetransaction['accountId'] = $CaccNoFromus;
            $chequetransaction['loanId'] = $loanid;
            $chequetransaction['employeeId'] = $empid;
            
            
            DB::table('chequetransactions')->insert($chequetransaction);
           
        }

        return response()->json("sucsess");
       
    }
}
