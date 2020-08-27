<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CashHandOver extends Controller
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
    
    
    public function handoverCheck(Request $request)
    {
        $routealid = 0;
        
        $this->validate($request,[
            'routrcsh' => 'exists:route,routeId',
            'datecsh' => 'required',
        ],
        [             
            'routrcsh.exists' => 'Please select route',
            'datecsh.required' => 'Date is Required',
            
            ]);
            $date = $request->datecsh;
            
            $check = DB::table('customer')
            ->where('customer.routeId', '=', $request->routrcsh)
            ->join('loan', 'loan.idcustomer', '=', 'customer.idcustomer')
            ->join('installment', 'installment.loanId', '=', 'loan.loanId')       
            ->where('loan.status', '=', 1)
            ->where('installment.datec', '<=', $date)
            ->where('installment.status', '!=', 2)
            // ->orWhere('installment.status','=', 1)
            // ->select('customer.idcustomer as idcustomer','customer.name as cusname','customer.nic as cusnic','loan.*','installment.amount as amountins','installment.paidAmount as paidAmountins','installment.datec as datec','installment.status as statusins','installment.loanId as loanId')                                                
            ->select('installment.amount as amountins','installment.paidAmount as paidAmountins','installment.datec as datec','installment.status as statusins','installment.loanId as loanId','customer.nic as nic','customer.name as name','customer.pno as cpno')                                                
            ->get();
            
            $targetamount = 0;
            $Collectedamount = 0;
            $arrersamount = 0;
            
            
            // statuspaid - 1  (There is a collected amount or has to collect amount)
            // statuspaid - 0  THe collected amount is already paid)
            $routename = DB::table('route')
            ->where('routeId','=',$request->routrcsh)
            ->get();
            
            foreach($routename as $nmr){
                $rname = $nmr->routename;
            }
            
            if(!$check->isEmpty()){
                foreach ($check as $rslt) {
                    
                    if($rslt->datec==$date){
                        $targetamount += $rslt->amountins;
                    }
                    
                    if($rslt->datec<$date && $rslt->statusins==1){
                        $arrersamount += $rslt->paidAmountins;
                    }
                    
                    if($rslt->statusins==1){
                        $Collectedamount += $rslt->paidAmountins;
                    }
                    
                }
                
                
                // return view("cashhandoveraccept")->with("cshsmry", $check);
                
                $returndata = '{"smrydta":[{"statuspaid":"1","arrersamount":"'.$arrersamount.'","targetamount":"'.$targetamount.'","collectedamount":"'.$Collectedamount.'","selectedroutename":"'.$rname.'","selectedrid":"'.$request->routrcsh.'","selectdate":"'.$date.'"}],"qrydata": '.$check.'}';
                return view("cashhandoveraccept")->with("cshsmry", json_decode($returndata,true));
            }else{
                $returndata = '{"smrydta":[{"statuspaid":"0","arrersamount":"'.$arrersamount.'","targetamount":"'.$targetamount.'","collectedamount":"'.$Collectedamount.'","selectedroutename":"'.$rname.'","selectedrid":"'.$request->routrcsh.'","selectdate":"'.$date.'"}],"qrydata": '.$check.'}';
                return view("cashhandoveraccept")->with("cshsmry", json_decode($returndata,true));
            }
            
            
            
        }
        
        public function approveCashHandover(Request $request)
        {
            
            $validator = \Validator::make($request->all(), [
                'datecsh' => 'required',
                'routrcsh' => 'exists:route,routeId',
                'cltamnt' => 'required',
                'cltedamnt' => 'required',
            ],
            [        
                'datecsh.required' => 'Date is Required .',     
                'routrcsh.exists' => 'Please select route',
                'cltamnt.required' => 'Please Calculate',
                'cltedamnt.required' => 'Please Calculate.',
                
                ]);
                
                
                // status - 1 validation error
                // status - 2 Both 2 values are 0
                // status - 3 Already entered
                // status - 4 success
                
                if ($validator->fails())
                {
                    return response()->json(['status'=>'1','errors'=>$validator->errors()->all()]);
                }
                
                $today = \Carbon\Carbon::now();
                
                $date = $today->format('Y-m-d \ H:i:s');
                
                if($request->cltamnt == 0 && $request->cltedamnt == 0  ){
                    return response()->json(['status'=>'2']);
                }else{
                    
                    $value = DB::table('collectorroute')
                    ->select('collectorRouteId')
                    ->where('routeId', $request->routrcsh)
                    ->first();
                    
                    $cltorrtid = $value->collectorRouteId;
                    
                    $checkexists = DB::table('collectionhandover')
                    ->where('collectorRouteId','=', $cltorrtid)
                    ->Where('collectiondate', '=', $request->datecsh)
                    ->get();
                    
                    if($checkexists->isEmpty()){
                        
                        $lginempid = 13;
                        $date1 = array();
                        $data1['employeeId'] = $lginempid;
                        $data1['status'] = '1';
                        $data1['collectiondate'] = $request->datecsh;
                        $data1['handoverdate'] = $date;
                        $data1['collectorRouteId'] = $value->collectorRouteId;
                        $data1['amount'] = $request->cltamnt;
                        $data1['collectedamount'] = $request->cltedamnt;
                        $data1['arrershvamount'] = $request->arrersamnt;
                        
                        
                        DB::table('collectionhandover')->insertGetId($data1);
                        
                        $data = array();
                        $data['status'] = 2;
                        
                        $check = DB::table('customer')
                        ->where('customer.routeId', '=', $request->routrcsh)
                        ->join('loan', 'loan.idcustomer', '=', 'customer.idcustomer')
                        ->join('installment', 'installment.loanId', '=', 'loan.loanId')       
                        ->where('loan.status', '=', 1)
                        ->where('installment.datec', '<=', $date)
                        ->where('installment.status', '!=', 2)
                        ->select('installment.status as statusins','installment.installmentId as installmentId')                                                
                        ->get();
                        
                        foreach ($check as $rslt) {
                            
                            if($rslt->statusins==1){
                                DB::table('installment')
                                ->where('installmentId',$rslt->installmentId)
                                ->update($data);
                            }                            
                            
                        }
                        
                        return response()->json(['status'=>'4']);              
                    }else{
                        
                        return response()->json(['status'=>'3']);
                        
                    }
                    
                }
                
        }
            
            public function loadcchandoverEntry(Request $request)
            {
                
                $validator = \Validator::make($request->all(), [
                    'cchid' => 'required|exists:collectionhandover,collectionhandoverId'
                ],
                [
                    'cchid.required' => 'Entry Id is Required',
                    'cchid.exists' => 'Entry Id is Incorrect',
                    
                    ]);
                    
                    if ($validator->fails())
                    {
                        error_log('Some message here.');
                        return response()->json(['status'=>'1','errors'=>$validator->errors()->all()]);
                    }
                    
                    $type = $request->cchid;
                    $value = DB::table('collectionhandover')
                    ->where('collectionhandover.collectionhandoverId', $type)
                    ->join('collectorroute','collectorroute.collectorRouteId','collectionhandover.collectorRouteId')
                    ->join('employee','employee.employeeId','collectionhandover.employeeId')
                    ->join('route','route.routeId','collectorroute.routeId')
                    ->select('collectorroute.*','collectionhandover.*','employee.name as empname','route.routename as routename')
                    ->get();

                    foreach ($value as $val) {
                    
                    $routeid = $val->routeId;
                    $collectiondate = $val->collectiondate;

                    }
                    
                    $check = DB::table('customer')
                    ->where('customer.routeId', '=', $routeid)
                    ->join('loan', 'loan.idcustomer', '=', 'customer.idcustomer')
                    ->join('installment', 'installment.loanId', '=', 'loan.loanId')
                    ->where('installment.datec', '<=', $collectiondate)
                    // ->orWhere('installment.status','=', 1)
                    // ->select('customer.idcustomer as idcustomer','customer.name as cusname','customer.nic as cusnic','loan.*','installment.amount as amountins','installment.paidAmount as paidAmountins','installment.datec as datec','installment.status as statusins','installment.loanId as loanId')                                                
                    ->select('installment.amount as amountins','installment.paidAmount as paidAmountins','installment.datec as datec','installment.status as statusins','installment.installmentId as installmentId','installment.loanId as loanId','customer.nic as nic','customer.name as name','customer.pno as pno')                                                
                    ->get();
                    
                                    
                    $returndata = '{"smry": '.$value.',"entryhistory": '.$check.'}';
                    return view("modelchentryhistory")->with("cshsmry", json_decode($returndata,true));
                    // return view("modelchentryhistory")->with("ccmodel", $check);
                    // return response()->json(['status'=>$returndata]);
                    
                    
                    
                    
            }
                
                
            }
            