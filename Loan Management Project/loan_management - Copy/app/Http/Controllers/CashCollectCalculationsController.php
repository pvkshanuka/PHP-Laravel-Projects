<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;
use DateInterval;

class CashCollectCalculationsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
    }
    
    public function cccCalculation()
    {
        $today = \Carbon\Carbon::now();
        
        // $today->addDay();
        $date = $today->format('Y-m-d');
        
        $check = DB::table('loan')
        ->join('installment', 'installment.loanId', '=', 'loan.loanId')
        ->where('loan.status', '=', 0)            
        ->where('installment.datec', '<=', $date)
        ->where('installment.status', '=', 0)
        ->orWhere('installment.status','=', 1)
        ->select('loan.*','installment.amount as amountins','installment.paidAmount as paidAmountins','installment.datec as datec','installment.status as statusins','installment.loanId as loanId')                                                
        ->get();
        
        for ($i = 0; $i < 10; $i++){

            $date=0;
            
        }
        
        
        
        return response()->json($check);
        // return response()->json(['status'=>$value]);
        //  return response()->json(['status'=>'2','success'=>'Record is successfully added']);
    }
}
