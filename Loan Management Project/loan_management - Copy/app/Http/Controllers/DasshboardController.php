<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Session;
use Carbon;
use DateTime;
use DateInterval;
use Illuminate\Support\Facades\Redirect;
class DasshboardController extends Controller
{
    public function showloanData(Request $request)
    {
        $cusdata = [];

        $darily = DB::table('loan')
            ->where('loanTypeId', 1)
            ->sum('loan.amount');
       
        $monthly = DB::table('loan')
            ->where('loanTypeId', 2)
            ->sum('loan.amount');

        $monthlyp = DB::table('loan')
            ->where('loanTypeId', 3)
            ->sum('loan.amount');
        $proper = DB::table('loan')
            ->where('loanTypeId', 4)
            ->sum('loan.amount');
        $cheque = DB::table('loan')
            ->where('loanTypeId', 6)
            ->sum('loan.amount');
        $vehi = DB::table('loan')
            ->where('loanTypeId', 5)
            ->sum('loan.amount');

        array_push($cusdata, [
            'darily' => $darily,
            // 'darilycollect' => $darilycollect,
            'monthly' => $monthly,
            'monthlyp' => $monthlyp,
            'proper' => $proper,
            'cheque' => $cheque,
            'vehi' => $vehi,
        ]);

        return response()->json($cusdata);
    }
    public function showchequeData(Request $request)
    {
        $opendate = \Carbon\Carbon::now();
        $today = $opendate->format('Y-m-d');

        $data1 = [];
        $data = DB::table('chequetransactions')
            ->join(
                'bankaccount',
                'chequetransactions.accountId',
                '=',
                'bankaccount.accountId'
            )
            ->where('chequetransactions.realizeDate', '<=', $today)
            ->where('chequetransactions.status', '=', 1)
            ->get();

        foreach ($data as $value) {
            array_push($data1, [
                'checkNo' => $value->checkNo,
                'amount' => $value->amount,
                'bankname' => $value->accName,
                'accno' => $value->accNumber,
                'des' => $value->description,
            ]);
        }

        return response()->json($data1);
    }

    public function showcollectordata(Request $request){

        $data3 = [];
        $routeId = $request->routid;
        $today = \Carbon\Carbon::now();
        $datetm = $today->addDay();
        $date = $datetm->format('Y-m-d'); 

        $data = DB::table('customer')
                    ->join('route', 'route.routeId', '=', 'customer.routeId')
                    ->join('loan','loan.idcustomer','=','customer.idcustomer')
                    ->join('installment','installment.loanId','=','loan.loanId')
                    ->where('customer.routeId','=',$routeId)
                    ->where('loan.loanTypeId','=',1)
                    ->where('installment.datec','=', $date)
                    ->select(DB::raw('SUM(installment.paidAmount) as total_paid_amount'),DB::raw('SUM(installment.paidAmount) as total_paid_amount'),DB::raw('SUM(installment.amount) as total_amount'))
                    ->get();
                    

                    if ($data->isEmpty()) {
                        return response()->json(['status'=>'2','success'=>'Record is successfully added']);
                    }else{

                    

                    foreach ($data as  $value) {
                        # code...

                        $totpaidamount = $value->total_paid_amount;
                        $totamount = $value->total_amount;
                       
                    }
                    
                    $collectorname;
                    $collecto = DB::table('collectorroute')->where('routeId','=',$routeId)->get();
                    foreach ($collecto as $key => $value1) {

                        if ($value1->collectorRouteId=="") {
                            return response()->json(['status'=>'2','success'=>'Record is successfully added']);
                        }else{
                    
                            $colectid=$value1->collectorRouteId;

                       $empname =   DB::table('collector')
                         ->where('collector.idcollector','=',$colectid)
                         ->join('employee','employee.employeeId','=','collector.employeeId')
                         ->get('employee.name');
                         foreach ($empname as  $value2) {

                            $emplyeename = $value2->name;
                             # code...
                         }
                         array_push($data3, [
                            'totpaidamount' =>$totpaidamount,
                            'totamount' =>$totamount,
                            'collecname' =>$emplyeename,
                    
                       
                        ]);

                        }
                   
                    }
                }


                  
                    // $data1 = DB::table('customer')
                    // ->join('route', 'route.routeId', '=', 'customer.routeId')
                    // ->join('loan','loan.idcustomer','=','customer.idcustomer')
                    // ->join('installment','installment.loanId','=','loan.loanId')
                    // ->where('customer.routeId','=',$routeId)
                    // ->where('loan.loanTypeId','=',1)
                    // ->where('installment.datec','=', $date)
                    // ->sum('installment.paidAmount');

                 
                  //  $balance = $data-$data1;

                   



                    


        return response()->json($data3);

    }
    public function darilysummery(Request $request){

        $opendate = \Carbon\Carbon::now();
        $today = $opendate->format('Y-m-d');

        $instrument = DB::table('installmentpay')
        ->where('installmentpay.datec', '=', $today)
        ->sum('installmentpay.amount');

        $interst = DB::table('interestpay')
        ->where('interestpay.datec', '=', $today)
        ->sum('interestpay.paidAmount');

        $loanpay = DB::table('loanpay')
        ->where('loanpay.datec', '=', $today)
        ->sum('loanpay.amount');
        
        $depoamount = DB::table('chequetransactions')
        ->where('chequetransactions.depositedate', '=', $today)
        ->sum('chequetransactions.amount');


        $payamount = $instrument+$interst+$loanpay;
        $totamount = $payamount+$depoamount;

        $data3 = [];
        array_push($data3, [
            'totpaidamount' =>$payamount,
            'depoamount' =>$depoamount,
            'fullamo' =>$totamount,
            'today' =>$today,
            
    
       
        ]);

        return response()->json($data3);
    }
    public function allsummry(Request $request){
                
        $opendate = \Carbon\Carbon::now();
        $today = $opendate->format('Y-m-d');
$data=array();
      $loantype3=DB::table('loan')
            ->join('interest','interest.loanId','=','loan.loanId')
            ->join('interestpay','interestpay.interestId','=','interest.interestId')
            ->where('interestpay.datec','=', $today)
            ->where('loan.loanTypeId','=', 3)
            ->sum('interestpay.paidAmount');

            $loantype6=DB::table('loan')
            ->join('interest','interest.loanId','=','loan.loanId')
            ->join('interestpay','interestpay.interestId','=','interest.interestId')
            ->where('interestpay.datec','=', $today)
            ->where('loan.loanTypeId','=', 6)
            ->sum('interestpay.paidAmount');

            $loantype2=DB::table('loan')
            ->join('installment','installment.loanId','=','loan.loanId')
            ->join('installmentpay','installmentpay.installmentId','=','installment.installmentId')
            ->where('installmentpay.datec','=', $today)
            ->where('loan.loanTypeId','=', 2)
            ->sum('installmentpay.amount');
            $loantype1=DB::table('loan')
            ->join('installment','installment.loanId','=','loan.loanId')
            ->join('installmentpay','installmentpay.installmentId','=','installment.installmentId')
            ->where('installmentpay.datec','=', $today)
            ->where('loan.loanTypeId','=', 1)
            ->sum('installmentpay.amount');
            $loantype4=DB::table('loan')
            ->join('installment','installment.loanId','=','loan.loanId')
            ->join('installmentpay','installmentpay.installmentId','=','installment.installmentId')
            ->where('installmentpay.datec','=', $today)
            ->where('loan.loanTypeId','=', 4)
            ->sum('installmentpay.amount');
            $loantype5=DB::table('loan')
            ->join('installment','installment.loanId','=','loan.loanId')
            ->join('installmentpay','installmentpay.installmentId','=','installment.installmentId')
            ->where('installmentpay.datec','=', $today)
            ->where('loan.loanTypeId','=', 5)
            ->sum('installmentpay.amount');

            $loanpay=DB::table('loan')
            ->join('loanpay','loanpay.loanId','=','loan.loanId')
            ->where('loanpay.datec','=', $today)
            ->sum('loanpay.amount');
    // $darilyloan = DB::table('loan')
    // ->where('loanTypeId', 1)
    // ->sum('interestpay.paidAmount');
    $tot = $loantype3+$loantype1+$loantype2+$loantype4+$loantype5+$loantype6+ $loanpay;
  
    array_push($data, [
        'type3' =>   $loantype3,
        'type2' =>   $loantype2,
        'type1' =>   $loantype1,
        'type4' =>   $loantype4,
        'type5' =>   $loantype5,
        'type6' =>   $loantype6,
        'loanpay' =>   $loanpay,
        'tot' =>   $tot,
        
    ]);

        return response()->json($data);

    }
    
}
