<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon;
use DateTime;
use Illuminate\Support\Facades\Redirect;

class ChequeController extends Controller
{
    //

    public function addnewcheck(Request $request){
        $today = \Carbon\Carbon::now();
        $value = $request->session()->get('empid');
        $data = array();
            $data['checkNo'] = $request->check_number;
            $data['realizeDate'] = $request->check_date;
            $data['issueDate'] =  $today;
            $data['description'] =  $request->check_des;
            $data['accountId'] =  $request->paid_account;
            $data['amount'] =  $request->amount;
            $data['status'] = '1';
            $data['marked'] = '1';
            $data['employeeId'] =  $value;
           
            DB::table('chequetransactions')->insert($data);

           
            return response()->json($request);

    }

    public function load_cheque(Request $request){

        $data = DB::table('chequetransactions')->get();

     

        $content="";
        $cdata = array();
        foreach ($data as  $value) {
                $bankid = $value->accountId;
            $data1 = DB::table('bankaccount')->where('accountId',$bankid)->get();

            foreach ($data1 as $bankdata) {
                $bankname = $bankdata->accName;
                $accnum = $bankdata->accNumber;
                # code...
                array_push($cdata,[
                    "bname"=>$bankname,
                    "accnum"=>$accnum,
                    "redate"=>$value->realizeDate,
                    "amount"=>$value->amount,
                    "des"=>$value->description,
                    "tid"=>$value->transactionsId,
                    "marked"=>$value->marked,
                    "status"=>$value->status

                ]);
            }

        }

        return response()->json($cdata);


    }
    public function Advance_searchData(Request $request){


        $paidstatus = $request->paid;
        $firstdate = $request->f_date;
        $lastdate = $request->l_date;
        $cdata = array();

            if ($firstdate!="" && $lastdate!="" && $paidstatus==3) {
                # code...
                // $cdata=["date dekata adala serama details tika"];

                $users = DB::table('chequetransactions')->where('realizeDate','>=',$request->f_date)
                ->where('realizeDate','<=',$request->l_date)
                ->get();


                foreach ($users as  $value) {
                    $bankid = $value->accountId;
                $data1 = DB::table('bankaccount')->where('accountId',$bankid)->get();
    
                foreach ($data1 as $key => $bankdata) {
                    $bankname = $bankdata->accName;
                    $accnum = $bankdata->accNumber;
                    # code...
    
                    array_push($cdata,[
                        "bname"=>$bankname,
                        "accnum"=>$accnum,
                        "redate"=>$value->realizeDate,
                        "amount"=>$value->amount,
                        "des"=>$value->description,
                        "tid"=>$value->transactionsId,
                        "marked"=>$value->marked,
                        "status"=>$value->status
    
                    ]);
                }
    
            
            }
            }elseif ($firstdate!="" && $lastdate!="" && $paidstatus==1) {
                # code...
                $users = DB::table('chequetransactions')->where('realizeDate','>=',$request->f_date)
                ->where('realizeDate','<=',$request->l_date)
                ->where('status','=',1)
                ->get();


                foreach ($users as  $value) {
                    $bankid = $value->accountId;
                $data1 = DB::table('bankaccount')->where('accountId',$bankid)->get();
    
                foreach ($data1 as $key => $bankdata) {
                    $bankname = $bankdata->accName;
                    $accnum = $bankdata->accNumber;
                    # code...
    
                    array_push($cdata,[
                        "bname"=>$bankname,
                        "accnum"=>$accnum,
                        "redate"=>$value->realizeDate,
                        "amount"=>$value->amount,
                        "des"=>$value->description,
                        "tid"=>$value->transactionsId,
                        "marked"=>$value->marked,
                        "status"=>$value->status
    
                    ]);
                }
    
            
            }
            }elseif ($firstdate!="" && $lastdate!="" && $paidstatus==2) {
                # code...
                $users = DB::table('chequetransactions')->where('realizeDate','>=',$request->f_date)
                ->where('realizeDate','<=',$request->l_date)
                ->where('status','=',2)
                ->get();


                foreach ($users as  $value) {
                    $bankid = $value->accountId;
                $data1 = DB::table('bankaccount')->where('accountId',$bankid)->get();
    
                foreach ($data1 as $key => $bankdata) {
                    $bankname = $bankdata->accName;
                    $accnum = $bankdata->accNumber;
                    # code...
    
                    array_push($cdata,[
                        "bname"=>$bankname,
                        "accnum"=>$accnum,
                        "redate"=>$value->realizeDate,
                        "amount"=>$value->amount,
                        "des"=>$value->description,
                        "tid"=>$value->transactionsId,
                        "marked"=>$value->marked,
                        "status"=>$value->status
    
                    ]);
                }
    
            
            }
            }elseif ($firstdate!="" && $lastdate!="" && $paidstatus==0) {
                # code...
                $users = DB::table('chequetransactions')->where('realizeDate','>=',$request->f_date)
                ->where('realizeDate','<=',$request->l_date)
                ->where('status','=',0)
                ->get();


                foreach ($users as  $value) {
                    $bankid = $value->accountId;
                $data1 = DB::table('bankaccount')->where('accountId',$bankid)->get();
    
                foreach ($data1 as $key => $bankdata) {
                    $bankname = $bankdata->accName;
                    $accnum = $bankdata->accNumber;
                    # code...
    
                    array_push($cdata,[
                        "bname"=>$bankname,
                        "accnum"=>$accnum,
                        "redate"=>$value->realizeDate,
                        "amount"=>$value->amount,
                        "des"=>$value->description,
                        "tid"=>$value->transactionsId,
                        "marked"=>$value->marked,
                        "status"=>$value->status
    
                    ]);
                }
    
            
            }
            }elseif ($firstdate=="" && $lastdate=="" && $paidstatus==3) {
                # code...
                $users = DB::table('chequetransactions') ->get();


                foreach ($users as  $value) {
                    $bankid = $value->accountId;
                $data1 = DB::table('bankaccount')->where('accountId',$bankid)->get();
    
                foreach ($data1 as $key => $bankdata) {
                    $bankname = $bankdata->accName;
                    $accnum = $bankdata->accNumber;
                    # code...
    
                    array_push($cdata,[
                        "bname"=>$bankname,
                        "accnum"=>$accnum,
                        "redate"=>$value->realizeDate,
                        "amount"=>$value->amount,
                        "des"=>$value->description,
                        "tid"=>$value->transactionsId,
                        "marked"=>$value->marked,
                        "status"=>$value->status
    
                    ]);
                }
    
            
            }
            }elseif ($firstdate=="" && $lastdate=="" && $paidstatus==0) {
                # code...
                $users = DB::table('chequetransactions')
                ->where('status','=',0)
                ->get();


                foreach ($users as  $value) {
                    $bankid = $value->accountId;
                $data1 = DB::table('bankaccount')->where('accountId',$bankid)->get();
    
                foreach ($data1 as $key => $bankdata) {
                    $bankname = $bankdata->accName;
                    $accnum = $bankdata->accNumber;
                    # code...
    
                    array_push($cdata,[
                        "bname"=>$bankname,
                        "accnum"=>$accnum,
                        "redate"=>$value->realizeDate,
                        "amount"=>$value->amount,
                        "des"=>$value->description,
                        "tid"=>$value->transactionsId,
                        "marked"=>$value->marked,
                        "status"=>$value->status
    
                    ]);
                }
    
            
            }
            }elseif ($firstdate=="" && $lastdate=="" && $paidstatus==1) {
                # code...
                $users = DB::table('chequetransactions')
                ->where('status','=',1)
                ->get();


                foreach ($users as  $value) {
                    $bankid = $value->accountId;
                $data1 = DB::table('bankaccount')->where('accountId',$bankid)->get();
    
                foreach ($data1 as $key => $bankdata) {
                    $bankname = $bankdata->accName;
                    $accnum = $bankdata->accNumber;
                    # code...
    
                    array_push($cdata,[
                        "bname"=>$bankname,
                        "accnum"=>$accnum,
                        "redate"=>$value->realizeDate,
                        "amount"=>$value->amount,
                        "des"=>$value->description,
                        "tid"=>$value->transactionsId,
                        "marked"=>$value->marked,
                        "status"=>$value->status
    
                    ]);
                }
    
            
            }
            }elseif ($firstdate=="" && $lastdate=="" && $paidstatus==2) {
                # code...
                $users = DB::table('chequetransactions')
                ->where('status','=',2)
                ->get();


                foreach ($users as  $value) {
                    $bankid = $value->accountId;
                $data1 = DB::table('bankaccount')->where('accountId',$bankid)->get();
    
                foreach ($data1 as $key => $bankdata) {
                    $bankname = $bankdata->accName;
                    $accnum = $bankdata->accNumber;
                    # code...
    
                    array_push($cdata,[
                        "bname"=>$bankname,
                        "accnum"=>$accnum,
                        "redate"=>$value->realizeDate,
                        "amount"=>$value->amount,
                        "des"=>$value->description,
                        "tid"=>$value->transactionsId,
                        "marked"=>$value->marked,
                        "status"=>$value->status
    
                    ]);
                }
    
            
            }
            }



        
        
        return response()->json($cdata);
    }

    public function checked_cheque_data(Request $request){

        $custid = $request->c_id;


        // $data['cusid'] = $request->cusid;
       DB::table('chequetransactions')
              ->where('transactionsId', $custid)
              ->update(['marked' => 0]);
    }
    public function checked_dipositeData(Request $request){
        $custid = $request->c_id;
        $opendate = \Carbon\Carbon::now();
        $today = $opendate->format('Y-m-d');

        // $data['cusid'] = $request->cusid;

        DB::update(
            'update chequetransactions set depositedate = ?,status=? where transactionsId = ?',
            [$today, 0, $custid]
        );
    

    }

    public function return_cheque_data(Request $request){
        $custid = $request->c_id;


        // $data['cusid'] = $request->cusid;
       DB::table('chequetransactions')
              ->where('transactionsId', $custid)
              ->update(['status' => 2]);
    
    }
    public function customer_cheque_paid(Request $request){
        $custid = $request->check_id;
        $status = $request->pstatus;

        $test = array();
            if ($status==1) {
                DB::table('checkdetails')
                ->where('checkDetailId', $custid)
                ->update(['status' => 0]);
            }else if ($status==2) {
                DB::update(
                    'update checkdetails set status = ?,returnpanalty=? where checkDetailId = ?',
                    [2,200.00, $custid]
                );
            }else if ($status==3) {
                DB::update(
                    'update checkdetails set returnpanalty=? where checkDetailId = ?',
                    [0, $custid]
                );
            }


        
        return response()->json($test);

    }
    
    
    public function customer_cheque_return(Request $request){
        $custid = $request->check_id;


        DB::update(
            'update checkdetails set status = ?,returnpanalty=? where checkDetailId = ?',
            [2,200.00, $custid]
        );
        // DB::table('checkdetails')
        // ->where('checkDetailId', $custid)
        // ->update(['status' => 0]);
        return response()->json($request);

    }
    public function customer_cheque_clear(Request $request){
        $custid = $request->check_id;


        DB::update(
            'update checkdetails set status = ?,returnpanalty=? where checkDetailId = ?',
            [0,0.00, $custid]
        );
        // DB::table('checkdetails')
        // ->where('checkDetailId', $custid)
        // ->update(['status' => 0]);
        return response()->json($request);

    }
}
