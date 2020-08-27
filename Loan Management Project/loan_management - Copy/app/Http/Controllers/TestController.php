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

class TestController extends Controller
{
  
    

    public function testing(Request $request){


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
