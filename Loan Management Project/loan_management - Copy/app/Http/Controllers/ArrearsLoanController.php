<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Session;
use Carbon;
use DateTime;
use DateInterval;
use Illuminate\Support\Facades\Redirect;
class ArrearsLoanController extends Controller
{
    public function showarrearsamount(Request $request){
       
       $loan_Id = $request->loanid;
       $Loan_amount = $request->amount;

           $balance= DB::table('installment')
            // ->where('status', 0)  
            ->where('loanId', $loan_Id)
            ->sum('installment.amount');  
            $balance1= DB::table('installment')
            // ->where('status', 0)  
            ->where('loanId', $loan_Id)
            ->sum('installment.paidAmount');  

            $newBalance = $balance-$balance1+$Loan_amount;


       
        return response()->json($newBalance);
    }

    public function arresloanPlan(Request $request)
    {
        $output = '';

        $deatils = [];

        $dbdates = [];
        $date3 = [];

        $dailyAmout = $request->dailyamount;
        $count = $request->count;
        $date;

        // $deatils['amount'] = ['$dailyAmout'];
        // $deatils['name'] = ['$Name'];
        // $deatils['reg'] = ['$regNum'];

        $today = \Carbon\Carbon::now();

        for ($i = 0; $count > $i; $i++) {
            $today->addDay();
            $date = $today->format('Y-m-d');

            $data = DB::table('holidays')->get();

            $deatils[$i] = $date;
        }

        $c = 0;
        $d = 0;
        foreach ($data as $label) {
            $dbdates[$c] = $label->datec;
            $c++;
        }

        $arraycount = count($deatils);

        $dbcount = count($dbdates);

        for ($a = 0; $arraycount > $a; $a++) {
            $readdate = $deatils[$a];

            for ($b = 0; $dbcount > $b; $b++) {
                $readdb = $dbdates[$b];

                if ($readdate == $readdb) {
                    $date3[$d] = ["$readdb"];
                    $d++;
                    unset($deatils[$a]);
                }
            }
        }

        $deatils = array_values($deatils);

        for ($s = 0; $s < $d; $s++) {
            $last = end($deatils);
            $datetime = new DateTime($last);
            $datetime->add(new DateInterval('P1D'));

            $new_date = $datetime->format('Y-m-d');

            array_push($deatils, $new_date);
        }
        return response()->json($deatils);
    }


    public function viewOldLoan(Request $request){
        $cusdata = [];
        $clid = $request->cusid;


    
        $data1 = DB::table('loan')
        ->join('customer', 'loan.idcustomer', '=', 'customer.idcustomer')
        ->where('loan.custom_loanId','=',$clid)
        ->where('loan.status','=',1)
        ->get();

        if($data1->isEmpty()) {
            # code...
      
        
            return response()->json(['status'=>'2','success'=>'Record is successfully added']);


    } else {
        foreach ($data1 as $data) {

            $loanId = $data->loanId;
           $payamount =  DB::table('installment') 
            ->where('loanId', $loanId)
            ->sum('installment.paidAmount'); 
            
            $fullAmount = $data->amount+$data->targetIncome;
            $balance = $fullAmount-$payamount;
            array_push($cusdata, [
                'name' => $data->name,
                'mobile' => $data->pno,
                'nic' => $data->nic,
                'id' => $data->idcustomer,
                'img' => $data->img,
                'payamount' =>$payamount,
                'fullamount' =>$fullAmount,
                'balance' =>$balance,
                'loanid' => $loanId,
                'enddate' => $data->endDate,
                'culoanid' => $data->custom_loanId,
            ]);

        }
        return response()->json($cusdata);
        
    }

       
    }

    public function recreateloan(Request $request){


      
        $opendate = \Carbon\Carbon::now();
        $datefmt = $opendate->format('Y-m-d');
        $amount = $request->amount;
        $cus_id = $request->cid;
        $count = $request->count;
        $darlyamount = $request->dailyamount;
        $enddate = $request->end;
        $comment = $request->lcomment;
        $lonid = $request->loanid;
        $plan = $request->plan;
        $realamount = $request->realamount;
        $pmethod = $request->pmethod;


        $loandetails = [];

        $loandetails['takenDate'] = $datefmt;
        $loandetails['endDate'] = $enddate;
        $loandetails['loanTypeId'] = 1;
        $loandetails['idcustomer'] = $cus_id;
        $loandetails['status'] = '1';
        $loandetails['amount'] = $realamount;
        $loandetails['paidAmount'] = '0';
        $loandetails['targetIncome'] = $amount-$realamount;
        $loandetails['completeStatus'] = '0';
        $loandetails['rate'] = '0';
       

        $loanid = DB::table('loan')->insertGetId($loandetails);

        $installment = [];
        $installmentdata = [];
        $dateplan = [];

        $lonid = [];
       
        $lonid = $request->loanid;
        $dateplan = $request->plan;


        for ($a = 0; $a < count($dateplan); $a++) {
            $installment['amount'] = $darlyamount;
            $installment['datec'] = $dateplan[$a];
            $installment['status'] = '1';
            $installment['loanId'] = $loanid;
            $installment['paidAmount'] = '0';

            array_push($installmentdata, $installment);
        }
        DB::table('installment')->insert($installmentdata);

        $updatedata = [];
        $updatedata1 = [];
        $transferdata = [];
        $transferdata1 = [];
        for ($b = 0; $b < count($lonid); $b++) {

            $updatedata['loanId']= $lonid[$b];
            $transferdata['fromloanId']= $lonid[$b];
            $transferdata['toloanId']= $loanid;
            $transferdata['note']= $comment;
            $transferdata['status']= '1';
            array_push($updatedata1, $updatedata);
            array_push($transferdata1, $transferdata);
            DB::table('loan')
        ->where('loanId', $updatedata1)
        ->update(['status' => 3]);
        }
        
        DB::table('loantransfer')->insert($transferdata1);

  

        return response()->json($updatedata1);
    }
    public function recreateloanplan(Request $request){
        $output = '';

        $deatils = [];

        $dbdates = [];
        $date3 = [];

        $dailyAmout = $request->dailyamount;
        $count = $request->count;
        $date;

        // $deatils['amount'] = ['$dailyAmout'];
        // $deatils['name'] = ['$Name'];
        // $deatils['reg'] = ['$regNum'];

        $today = \Carbon\Carbon::now();

        for ($i = 0; $count > $i; $i++) {
            $today->addDay();
            $date = $today->format('Y-m-d');

            $data = DB::table('holidays')->get();

            $deatils[$i] = $date;
        }

        $c = 0;
        $d = 0;
        foreach ($data as $label) {
            $dbdates[$c] = $label->datec;
            $c++;
        }

        $arraycount = count($deatils);

        $dbcount = count($dbdates);

        for ($a = 0; $arraycount > $a; $a++) {
            $readdate = $deatils[$a];

            for ($b = 0; $dbcount > $b; $b++) {
                $readdb = $dbdates[$b];

                if ($readdate == $readdb) {
                    $date3[$d] = ["$readdb"];
                    $d++;
                    unset($deatils[$a]);
                }
            }
        }

        $deatils = array_values($deatils);

        for ($s = 0; $s < $d; $s++) {
            $last = end($deatils);
            $datetime = new DateTime($last);
            $datetime->add(new DateInterval('P1D'));

            $new_date = $datetime->format('Y-m-d');

            array_push($deatils, $new_date);
        }
        return response()->json($deatils);
    }
 
    public function newcreateloan_reassing(Request $request){
        $opendate = \Carbon\Carbon::now();
        $datefmt = $opendate->format('Y-m-d');
        
        $amount = $request->newamount;
        $cus_id = $request->cid;
        $count = $request->count;
        $darlyamount = $request->dailyamount;
        $enddate = $request->end;
        $comment = $request->lcomment;
        $lonid = $request->lid;
        $pmethod = $request->pmethod;
      
        // $realamount = $request->realamount;
        $targetincom = $darlyamount*$count;
        $target1 = $targetincom-$amount;


        $loandetails = [];

        $loandetails['takenDate'] = $datefmt;
        $loandetails['endDate'] = $enddate;
        $loandetails['loanTypeId'] = 1;
        $loandetails['idcustomer'] = $cus_id;
        $loandetails['status'] = '1';
        $loandetails['amount'] = $amount;
        $loandetails['paidAmount'] = '0';
        $loandetails['targetIncome'] = $target1;
        $loandetails['completeStatus'] = '0';
        $loandetails['rate'] = '0';
      

        $loanid = DB::table('loan')->insertGetId($loandetails);

        $installment = [];
        $installmentdata = [];
        $dateplan = [];
        $dateplan = $request->plan;
        for ($a = 0; $a < count($dateplan); $a++) {
            $installment['amount'] = $darlyamount;
            $installment['datec'] = $dateplan[$a];
            $installment['status'] = '1';
            $installment['loanId'] = $loanid;
            $installment['paidAmount'] = '0';

            array_push($installmentdata, $installment);
        }
        DB::table('installment')->insert($installmentdata);

        DB::update('update loan set loancomment = ?,status=? where loanId = ?',[$comment,3, $lonid]);
        $transferdata1 = array();
        $transferdata1['fromloanId']=$lonid;
        $transferdata1['toloanId']=$loanid;
        $transferdata1['note']=$comment;
        $transferdata1['status']=1;

        DB::table('loantransfer')->insert($transferdata1);
        if ($pmethod==2) {
            $chequno = $request->chequeno;
            $accid = $request->accid;
            $chequedate = $request->date;
            $value = $request->session()->get('empid');
           

            $checktransaction = [];

            $checktransaction['checkNo'] = $chequno;
            $checktransaction['issueDate'] = $datefmt;
            $checktransaction['realizeDate'] = $chequedate;
            $checktransaction['loanId'] = $loanid;
            $checktransaction['accountId'] = $accid;
            $checktransaction['employeeId'] = $value;
            $checktransaction['description'] = 'Darly loan payment';
            $checktransaction['status'] = '1';
            $checktransaction['marked'] = '1';
            $checktransaction['amount'] = $amount;

            DB::table('chequetransactions')->insert($checktransaction);
        }
        return response()->json($request);
    }

    
}
