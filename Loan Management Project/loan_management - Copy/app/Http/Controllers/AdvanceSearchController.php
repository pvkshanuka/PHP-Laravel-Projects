<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Session;
use Carbon;
use Illuminate\Support\Facades\Redirect;
use PDF;

class AdvanceSearchController extends Controller
{
    public function darlyloanAdvanceSearch(Request $request)
    {
        
        
        $index = $request->index;
        if ($index == 8) {
            $check = $request->check;
            $routeId = $request->route;
            $fdate = $request->first_date;
            $edate = $request->last_date;
            $cdata = array();
            
            $route_data = DB::table('loan')
            ->join('installment', 'loan.loanId', '=', 'installment.loanId')
            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')
            ->where('installment.status', '=', $check)
            ->where('installment.datec', '>=', $fdate)
            ->where('customer.routeId', '=', $routeId)
            ->where('installment.datec', '<=', $edate)
            ->get('installment.*');
            
            foreach ($route_data as  $value) {
                $loanId = $value->loanId;
                
                $data1 = DB::table('loan')
                ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')
                ->where('loanId', $loanId)
                ->get();
                
                foreach ($data1 as  $cusdata) {
                    array_push($cdata, [
                        "cnic" => $cusdata->nic,
                        "creg" => $cusdata->customerNo,
                        "cname" => $cusdata->name,
                        "amount" => $value->amount,
                        "paidamount" => $value->paidAmount,
                        "status" => $value->status
                        
                        ]);
                    }
                }
                
                return response()->json($cdata);
            } elseif ($index == 1) {
                $fdate = $request->first_date;
                $edate = $request->last_date;
                $cdata = array();
                
                $users = DB::table('installment')->where('datec', '>=', $fdate)
                ->where('datec', '<=', $edate)
                ->get();
                
                foreach ($users as  $value) {
                    $loanId = $value->loanId;
                    
                    $data1 = DB::table('loan')
                    ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')
                    ->where('loanId', $loanId)
                    ->get();
                    
                    foreach ($data1 as  $cusdata) {
                        array_push($cdata, [
                            "cnic" => $cusdata->nic,
                            "creg" => $cusdata->customerNo,
                            "cname" => $cusdata->name,
                            "amount" => $value->amount,
                            "paidamount" => $value->paidAmount,
                            "status" => $value->status
                            
                            ]);
                        }
                    }
                    
                    
                    
                    return response()->json($cdata);
                } else if ($index == 2) {
                    $check = $request->p_status;
                    
                    $cdata = array();
                    $users = DB::table('installment')->where('status', $check)->get();
                    
                    
                    foreach ($users as  $value) {
                        $loanId = $value->loanId;
                        
                        $data1 = DB::table('loan')
                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')
                        ->where('loanId', $loanId)
                        ->get();
                        
                        foreach ($data1 as  $cusdata) {
                            array_push($cdata, [
                                "cnic" => $cusdata->nic,
                                "creg" => $cusdata->customerNo,
                                "cname" => $cusdata->name,
                                "amount" => $value->amount,
                                "paidamount" => $value->paidAmount,
                                "status" => $value->status
                                
                                ]);
                            }
                        }
                        
                        
                        
                        return response()->json($cdata);
                    } else if ($index == 3) {
                        $rout = $request->route;
                        $cdata = array();
                        
                        
                        $route_data = DB::table('loan')
                        ->join('installment', 'loan.loanId', '=', 'installment.loanId')
                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')
                        ->where('customer.routeId', '=', $rout)
                        ->get('installment.*');
                        
                        foreach ($route_data as  $value) {
                            $loanId = $value->loanId;
                            
                            $data1 = DB::table('loan')
                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')
                            ->where('loanId', $loanId)
                            ->get();
                            
                            foreach ($data1 as  $cusdata) {
                                array_push($cdata, [
                                    "cnic" => $cusdata->nic,
                                    "creg" => $cusdata->customerNo,
                                    "cname" => $cusdata->name,
                                    "amount" => $value->amount,
                                    "paidamount" => $value->paidAmount,
                                    "status" => $value->status
                                    
                                    ]);
                                }
                            }
                            
                            
                            
                            return response()->json($cdata);
                        } else if ($index == 4) {
                            $check = $request->p_status;
                            $route = $request->route;
                            
                            $cdata = array();
                            $route_data = DB::table('loan')
                            ->join('installment', 'loan.loanId', '=', 'installment.loanId')
                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')
                            ->where('customer.routeId', '=', $route)
                            ->where('installment.status', '=', $check)
                            ->get('installment.*');
                            
                            foreach ($route_data as  $value) {
                                $loanId = $value->loanId;
                                
                                $data1 = DB::table('loan')
                                ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')
                                ->where('loanId', $loanId)
                                ->get();
                                
                                foreach ($data1 as  $cusdata) {
                                    array_push($cdata, [
                                        "cnic" => $cusdata->nic,
                                        "creg" => $cusdata->customerNo,
                                        "cname" => $cusdata->name,
                                        "amount" => $value->amount,
                                        "paidamount" => $value->paidAmount,
                                        "status" => $value->status
                                        
                                        ]);
                                    }
                                }
                                
                                
                                
                                
                                
                                
                                return response()->json($cdata);
                            } else if ($index == 5) {
                                $route = $request->route;
                                $fdate = $request->first_date;
                                $edate = $request->last_date;
                                
                                $cdata = array();
                                
                                
                                $route_data = DB::table('loan')
                                ->join('installment', 'loan.loanId', '=', 'installment.loanId')
                                ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')
                                ->where('customer.routeId', '=', $route)
                                ->where('installment.datec', '>=', $fdate)
                                ->where('installment.datec', '<=', $edate)
                                ->get('installment.*');
                                
                                foreach ($route_data as  $value) {
                                    $loanId = $value->loanId;
                                    
                                    $data1 = DB::table('loan')
                                    ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')
                                    ->where('loanId', $loanId)
                                    ->get();
                                    
                                    foreach ($data1 as  $cusdata) {
                                        array_push($cdata, [
                                            "cnic" => $cusdata->nic,
                                            "creg" => $cusdata->customerNo,
                                            "cname" => $cusdata->name,
                                            "amount" => $value->amount,
                                            "paidamount" => $value->paidAmount,
                                            "status" => $value->status
                                            
                                            ]);
                                        }
                                    }
                                    
                                    
                                    return response()->json($cdata);
                                } else if ($index == 6) {
                                    $check = $request->p_status;
                                    $fdate = $request->first_date;
                                    $edate = $request->last_date;
                                    $cdata = array();
                                    
                                    $route_data = DB::table('loan')
                                    ->join('installment', 'loan.loanId', '=', 'installment.loanId')
                                    ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')
                                    ->where('installment.status', '=', $check)
                                    ->where('installment.datec', '>=', $fdate)
                                    ->where('installment.datec', '<=', $edate)
                                    ->get('installment.*');
                                    
                                    foreach ($route_data as  $value) {
                                        $loanId = $value->loanId;
                                        
                                        $data1 = DB::table('loan')
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')
                                        ->where('loanId', $loanId)
                                        ->get();
                                        
                                        foreach ($data1 as  $cusdata) {
                                            array_push($cdata, [
                                                "cnic" => $cusdata->nic,
                                                "creg" => $cusdata->customerNo,
                                                "cname" => $cusdata->name,
                                                "amount" => $value->amount,
                                                "paidamount" => $value->paidAmount,
                                                "status" => $value->status
                                                
                                                ]);
                                            }
                                        }
                                        
                                        
                                        
                                        
                                        
                                        return response()->json($cdata);
                                    }
    }
                                public function chequeloanAdvanceSearch(Request $request)
                                {
                                    
                                    $check="";
                                    $status = $request->Lstatus;
                                    $type = $request->Ltype;
                                    $rate = $request->rate;
                                    $sd = $request->sdate;
                                    $ed = $request->edate;
                                    
                                    if($status==0 && $type==0 && $rate==null&&$ed==null&&$sd==null)
                                    {
                                        $check = DB::table('loan')
                                        ->where('loan.loanTypeId', '=', 3)
                                        ->orWhere('loan.loanTypeId', '=', 6)
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')     
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get();
                                        
                                    }else if($status!=0 && $type!=0 &&$rate==null&&$ed==null&&$sd==null)
                                    {
                                        $check = DB::table('loan')
                                        ->where('loan.loanTypeId', '=', $type)
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')     
                                        ->where('loan.status', '=', $status)
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get();
                                        
                                    }else if($status==0 && $type!=0 &&$rate==null&&$ed==null&&$sd==null)
                                    {
                                        $check = DB::table('loan')
                                        ->where('loan.loanTypeId', '=', $type)
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')     
                                        //  ->where('loan.status', '=', 1)
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get();
                                        
                                        
                                    }else if( $status!=0 && $type==0 &&$rate==null&&$ed==null&&$sd==null)
                                    {
                                        $check = DB::table('loan')
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')     
                                        ->where('loan.status', '=', $status)
                                        ->where('loan.loanTypeId', '=', 3)
                                        ->orWhere('loan.loanTypeId', '=', 6)
                                        ->where('loan.status', '=', $status)
                                        
                                        
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get();
                                        // dd($check);
                                    }else if ($status==0 && $type==0 &&$rate!=null&&$ed==null&&$sd==null)
                                    {
                                        $check = DB::table('loan')
                                        ->where('loan.rate', '=', $rate)
                                        ->where('loan.loanTypeId', '=', 3)
                                        ->orWhere('loan.loanTypeId', '=', 6)
                                        ->where('loan.rate', '=', $rate)
                                        
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                        // ->where('loan.status', '=', $status)   
                                        
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get();  
                                        
                                    }else if($status!=0 && $type==0 &&$rate!=null&&$ed==null&&$sd==null)
                                    {
                                        $check = DB::table('loan')
                                        // ->where('loan.loanTypeId', '=', $type)
                                        // ->where('loan.loanTypeId', '=', 3)
                                        // ->orWhere('loan.loanTypeId', '=', 6)
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                        ->where('loan.status', '=', $status)   
                                        ->where('loan.rate', '=', $rate)
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get(); 
                                    }else if($status==0 && $type!=0 &&$rate!=null&&$ed==null&&$sd==null)
                                    {
                                        $check = DB::table('loan')
                                        ->where('loan.loanTypeId', '=', $type)
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                        // ->where('loan.status', '=', $status)   
                                        ->where('loan.rate', '=', $rate)
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get();  
                                    }else if($status!=0 && $type!=0 &&$rate!=null&&$ed==null&&$sd==null)
                                    {
                                        $check = DB::table('loan')
                                        ->where('loan.loanTypeId', '=', $type)
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                        ->where('loan.status', '=', $status)   
                                        ->where('loan.rate', '=', $rate)
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get(); 
                                    }else if($status==0 && $type==0 &&$rate==null&& $ed==null&&$sd!=null)
                                    {
                                        $check = DB::table('loan')
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                        ->where('loan.takenDate', '>=', $sd)
                                        ->where('loan.loanTypeId', '=', 3)
                                        ->orWhere('loan.loanTypeId', '=', 6)   
                                        ->where('loan.takenDate', '>=', $sd) 
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get();
                                    }else if($status!=0 && $type==0 &&$rate==null&& $ed==null&&$sd!=null)
                                    {
                                        $check = DB::table('loan')
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                        ->where('loan.takenDate', '>=', $sd)
                                        ->where('loan.status', '=', $status) 
                                        ->where('loan.loanTypeId', '=', 3)
                                        ->orWhere('loan.loanTypeId', '=', 6)   
                                        ->where('loan.takenDate', '>=', $sd) 
                                        ->where('loan.status', '=', $status) 
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get();
                                    }else if($status==0 && $type!=0 &&$rate==null&& $ed==null&&$sd!=null)
                                    {
                                        $check = DB::table('loan')
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                        ->where('loan.takenDate', '>=', $sd)
                                        ->where('loan.loanTypeId', '=', $type)
                                        ->where('loan.takenDate', '>=', $sd) 
                                        // ->where('loan.status', '=', $status) 
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get();
                                    }else if($status==0 && $type==0 &&$rate!=null&& $ed==null&&$sd!=null)
                                    {
                                        $check = DB::table('loan')
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                        ->where('loan.takenDate', '>=', $sd) 
                                        // ->where('loan.status', '=', $status) 
                                        ->where('loan.rate', '=', $rate)
                                        ->where('loan.loanTypeId', '=', 3)
                                        ->orWhere('loan.loanTypeId', '=', 6)   
                                        ->where('loan.takenDate', '>=', $sd) 
                                        // ->where('loan.status', '=', $status) 
                                        ->where('loan.rate', '=', $rate)
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get();
                                    }else if($status==0 && $type==0 &&$rate==null&& $ed!=null&&$sd!=null)
                                    {
                                        $check = DB::table('loan')
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                        ->where('loan.takenDate', '>=', $sd) 
                                        // ->where('loan.status', '=', $status) 
                                        ->where('loan.takenDate', '<=', $ed)
                                        ->where('loan.loanTypeId', '=', 3)
                                        ->orWhere('loan.loanTypeId', '=', 6)   
                                        ->where('loan.takenDate', '>=', $sd) 
                                        // ->where('loan.status', '=', $status) 
                                        ->where('loan.takenDate', '<=', $ed)
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get(); 
                                    }else if($status!=0 && $type==0 &&$rate==null&& $ed!=null&&$sd!=null)
                                    {
                                        $check = DB::table('loan')
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                        ->where('loan.takenDate', '>=', $sd) 
                                        
                                        ->where('loan.takenDate', '<=', $ed)
                                        ->where('loan.status', '=', $status) 
                                        ->where('loan.loanTypeId', '=', 3)
                                        ->orWhere('loan.loanTypeId', '=', 6)   
                                        ->where('loan.takenDate', '>=', $sd) 
                                        // ->where('loan.status', '=', $status) 
                                        ->where('loan.takenDate', '<=', $ed)
                                        ->where('loan.status', '=', $status) 
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get(); 
                                    }else if($status!=0 && $type!=0 &&$rate==null&& $ed!=null&&$sd!=null)
                                    {
                                        $check = DB::table('loan')
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                        ->where('loan.takenDate', '>=', $sd) 
                                        
                                        ->where('loan.takenDate', '<=', $ed)
                                        ->where('loan.status', '=', $status) 
                                        ->where('loan.loanTypeId', '=', $type)
                                        
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get(); 
                                    }else if($status!=0 && $type!=0 &&$rate!=null&& $ed!=null&&$sd!=null)
                                    {
                                        $check = DB::table('loan')
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                        ->where('loan.takenDate', '>=', $sd) 
                                        
                                        ->where('loan.takenDate', '<=', $ed)
                                        ->where('loan.status', '=', $status) 
                                        ->where('loan.loanTypeId', '=', $type)
                                        ->where('loan.rate', '=', $rate)
                                        
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get(); 
                                    }else if($status==0 && $type!=0 &&$rate!=null&& $ed!=null&&$sd!=null)
                                    {
                                        
                                        $check = DB::table('loan')
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                        ->where('loan.takenDate', '>=', $sd) 
                                        
                                        ->where('loan.takenDate', '<=', $ed)
                                        // ->where('loan.status', '=', $status) 
                                        ->where('loan.loanTypeId', '=', $type)
                                        // ->orWhere('loan.loanTypeId', '=', 6)   
                                        
                                        ->where('loan.rate', '=', $rate)
                                        // ->where('loan.status', '=', $status) 
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get(); 
                                    }else if($status==0 && $type==0 &&$rate!=null&& $ed!=null&&$sd!=null){
                                        $check = DB::table('loan')
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                        ->where('loan.takenDate', '>=', $sd) 
                                        
                                        ->where('loan.takenDate', '<=', $ed)
                                        ->where('loan.rate', '=', $rate)
                                        // ->where('loan.status', '=', $status) 
                                        ->where('loan.loanTypeId', '=', 3)
                                        ->orWhere('loan.loanTypeId', '=', 6)   
                                        ->where('loan.takenDate', '>=', $sd) 
                                        // ->where('loan.status', '=', $status) 
                                        ->where('loan.takenDate', '<=', $ed)
                                        ->where('loan.rate', '=', $rate)
                                        
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get(); 
                                    }else if($status==0 && $type==0 &&$rate==null&& $ed!=null&&$sd==null)
                                    {
                                        $check = DB::table('loan')
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                        
                                        
                                        ->where('loan.takenDate', '<=', $ed)
                                        
                                        // ->where('loan.status', '=', $status) 
                                        ->where('loan.loanTypeId', '=', 3)
                                        ->orWhere('loan.loanTypeId', '=', 6)   
                                        
                                        // ->where('loan.status', '=', $status) 
                                        ->where('loan.takenDate', '<=', $ed)
                                        
                                        
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get(); 
                                        
                                    }else if($status!=0 && $type==0 &&$rate==null&& $ed!=null&&$sd==null){
                                        $check = DB::table('loan')
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                        
                                        
                                        ->where('loan.takenDate', '<=', $ed)
                                        ->where('loan.status', '=', $status) 
                                        ->where('loan.loanTypeId', '=', 3)
                                        ->orWhere('loan.loanTypeId', '=', 6)   
                                        ->where('loan.takenDate', '<=', $ed)
                                        ->where('loan.status', '=', $status) 
                                        
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get(); 
                                        
                                    }else if($status==0 && $type!=0 &&$rate==null&& $ed!=null&&$sd==null)
                                    {
                                        $check = DB::table('loan')
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                        
                                        
                                        ->where('loan.takenDate', '<=', $ed)
                                        // ->where('loan.status', '=', $status) 
                                        ->where('loan.loanTypeId', '=', $type)
                                        
                                        
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get(); 
                                    }else if($status==0 && $type==0 &&$rate!=null&& $ed!=null&&$sd==null)
                                    {
                                        $check = DB::table('loan')
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                        
                                        
                                        ->where('loan.takenDate', '<=', $ed)
                                        ->where('loan.rate', '=', $rate)
                                        ->where('loan.loanTypeId', '=', 3)
                                        ->orWhere('loan.loanTypeId', '=', 6)   
                                        ->where('loan.takenDate', '<=', $ed)
                                        ->where('loan.rate', '=', $rate)
                                        
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get(); 
                                    }else if($status!=0 && $type==0 &&$rate!=null&& $ed!=null&&$sd!=null)
                                    {
                                        $check = DB::table('loan')
                                        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                        
                                        
                                        ->where('loan.takenDate', '<=', $ed)
                                        ->where('loan.takenDate', '>=', $sd)
                                        ->where('loan.rate', '=', $rate)
                                        ->where('loan.status', '=', $status) 
                                        ->where('loan.loanTypeId', '=', 3)
                                        ->orWhere('loan.loanTypeId', '=', 6)   
                                        ->where('loan.takenDate', '<=', $ed)
                                        ->where('loan.takenDate', '>=', $sd)
                                        ->where('loan.rate', '=', $rate)
                                        ->where('loan.status', '=', $status) 
                                        
                                        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                        ->get(); 
                                    }
                                    // }if(($status==0 && $type==0 &&$rate!=null&& $ed!=null&&$sd==null)
                                    // {
                                        
                                        // }
                                        return view("monthlyloanreport")->with("ldata", $check);
                                }
                                    
                                    
                                    public function propertyloanAdvanceSearch(Request $request)
                                    {
                                        
                                        $check="";
                                        $status = $request->Lstatus;
                                        $type = $request->Ltype;
                                        $rate = $request->rate;
                                        $sd = $request->sdate;
                                        $ed = $request->edate;
                                        // $slt = "'customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype'";
                                        // $slt = " 'customer.nic as cnic' ";
                                        
                                        if($status==0 && $type==0 && $rate==null&&$ed==null&&$sd==null)
                                        {
                                            $check = DB::table('loan')
                                            ->where('loan.loanTypeId', '=', 4)
                                            ->orWhere('loan.loanTypeId', '=', 5)
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')     
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                            ->get();
                                            
                                        }else if($status!=0 && $type!=0 &&$rate==null&&$ed==null&&$sd==null)
                                        {
                                            $check = DB::table('loan')
                                            ->where('loan.loanTypeId', '=', $type)
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')     
                                            ->where('loan.status', '=', $status)
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                            ->get();
                                            
                                        }else if($status==0 && $type!=0 &&$rate==null&&$ed==null&&$sd==null)
                                        {
                                            $check = DB::table('loan')
                                            ->where('loan.loanTypeId', '=', $type)
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')     
                                            //  ->where('loan.status', '=', 1)
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                  
                                            ->get();
                                            
                                            
                                        }else if( $status!=0 && $type==0 &&$rate==null&&$ed==null&&$sd==null)
                                        {
                                            $check = DB::table('loan')
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')     
                                            ->where('loan.status', '=', $status)
                                            ->where('loan.loanTypeId', '=', 4)
                                            ->orWhere('loan.loanTypeId', '=', 5)
                                            ->where('loan.status', '=', $status)
                                            
                                            
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                  
                                            ->get();
                                            // dd($check);
                                        }else if ($status==0 && $type==0 &&$rate!=null&&$ed==null&&$sd==null)
                                        {
                                            $check = DB::table('loan')
                                            ->where('loan.rate', '=', $rate)
                                            ->where('loan.loanTypeId', '=', 4)
                                            ->orWhere('loan.loanTypeId', '=', 5)
                                            ->where('loan.rate', '=', $rate)
                                            
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                            // ->where('loan.status', '=', $status)   
                                            
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                  
                                            ->get();  
                                            
                                        }else if($status!=0 && $type==0 &&$rate!=null&&$ed==null&&$sd==null)
                                        {
                                            $check = DB::table('loan')
                                            // ->where('loan.loanTypeId', '=', $type)
                                            ->where('loan.loanTypeId', '=', 4)
                                            ->orWhere('loan.loanTypeId', '=', 5)
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                            ->where('loan.status', '=', $status)   
                                            ->where('loan.rate', '=', $rate)
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                  
                                            ->get(); 
                                        }else if($status==0 && $type!=0 &&$rate!=null&&$ed==null&&$sd==null)
                                        {
                                            $check = DB::table('loan')
                                            ->where('loan.loanTypeId', '=', $type)
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                            // ->where('loan.status', '=', $status)   
                                            ->where('loan.rate', '=', $rate)
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                  
                                            ->get();  
                                        }else if($status!=0 && $type!=0 &&$rate!=null&&$ed==null&&$sd==null)
                                        {
                                            $check = DB::table('loan')
                                            ->where('loan.loanTypeId', '=', $type)
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                            ->where('loan.status', '=', $status)   
                                            ->where('loan.rate', '=', $rate)
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                  
                                            ->get(); 
                                        }else if($status==0 && $type==0 &&$rate==null&& $ed==null&&$sd!=null)
                                        {
                                            $check = DB::table('loan')
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                            ->where('loan.takenDate', '>=', $sd)
                                            ->where('loan.loanTypeId', '=', 4)
                                            ->orWhere('loan.loanTypeId', '=', 5)   
                                            ->where('loan.takenDate', '>=', $sd) 
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                  
                                            ->get();
                                        }else if($status!=0 && $type==0 &&$rate==null&& $ed==null&&$sd!=null)
                                        {
                                            $check = DB::table('loan')
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                            ->where('loan.takenDate', '>=', $sd)
                                            ->where('loan.status', '=', $status) 
                                            ->where('loan.loanTypeId', '=', 4)
                                            ->orWhere('loan.loanTypeId', '=', 5)   
                                            ->where('loan.takenDate', '>=', $sd) 
                                            ->where('loan.status', '=', $status) 
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                  
                                            ->get();
                                        }else if($status==0 && $type!=0 &&$rate==null&& $ed==null&&$sd!=null)
                                        {
                                            $check = DB::table('loan')
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                            ->where('loan.takenDate', '>=', $sd)
                                            ->where('loan.loanTypeId', '=', $type)
                                            ->where('loan.takenDate', '>=', $sd) 
                                            // ->where('loan.status', '=', $status) 
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                  
                                            ->get();
                                        }else if($status==0 && $type==0 &&$rate!=null&& $ed==null&&$sd!=null)
                                        {
                                            $check = DB::table('loan')
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                            ->where('loan.takenDate', '>=', $sd) 
                                            // ->where('loan.status', '=', $status) 
                                            ->where('loan.rate', '=', $rate)
                                            ->where('loan.loanTypeId', '=', 4)
                                            ->orWhere('loan.loanTypeId', '=', 5)   
                                            ->where('loan.takenDate', '>=', $sd) 
                                            // ->where('loan.status', '=', $status) 
                                            ->where('loan.rate', '=', $rate)
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                  
                                            ->get();
                                        }else if($status==0 && $type==0 &&$rate==null&& $ed!=null&&$sd!=null)
                                        {
                                            $check = DB::table('loan')
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                            ->where('loan.takenDate', '>=', $sd) 
                                            // ->where('loan.status', '=', $status) 
                                            ->where('loan.takenDate', '<=', $ed)
                                            ->where('loan.loanTypeId', '=', 4)
                                            ->orWhere('loan.loanTypeId', '=', 5)   
                                            ->where('loan.takenDate', '>=', $sd) 
                                            // ->where('loan.status', '=', $status) 
                                            ->where('loan.takenDate', '<=', $ed)
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                  
                                            ->get(); 
                                        }else if($status!=0 && $type==0 &&$rate==null&& $ed!=null&&$sd!=null)
                                        {
                                            $check = DB::table('loan')
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                            ->where('loan.takenDate', '>=', $sd) 
                                            
                                            ->where('loan.takenDate', '<=', $ed)
                                            ->where('loan.status', '=', $status) 
                                            ->where('loan.loanTypeId', '=', 4)
                                            ->orWhere('loan.loanTypeId', '=', 5)   
                                            ->where('loan.takenDate', '>=', $sd) 
                                            // ->where('loan.status', '=', $status) 
                                            ->where('loan.takenDate', '<=', $ed)
                                            ->where('loan.status', '=', $status) 
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                  
                                            ->get(); 
                                        }else if($status!=0 && $type!=0 &&$rate==null&& $ed!=null&&$sd!=null)
                                        {
                                            $check = DB::table('loan')
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                            ->where('loan.takenDate', '>=', $sd) 
                                            
                                            ->where('loan.takenDate', '<=', $ed)
                                            ->where('loan.status', '=', $status) 
                                            ->where('loan.loanTypeId', '=', $type)
                                            
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                  
                                            ->get(); 
                                        }else if($status!=0 && $type!=0 &&$rate!=null&& $ed!=null&&$sd!=null)
                                        {
                                            $check = DB::table('loan')
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                            ->where('loan.takenDate', '>=', $sd) 
                                            
                                            ->where('loan.takenDate', '<=', $ed)
                                            ->where('loan.status', '=', $status) 
                                            ->where('loan.loanTypeId', '=', $type)
                                            ->where('loan.rate', '=', $rate)
                                            
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                  
                                            ->get(); 
                                        }else if($status==0 && $type!=0 &&$rate!=null&& $ed!=null&&$sd!=null)
                                        {
                                            
                                            $check = DB::table('loan')
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                            ->where('loan.takenDate', '>=', $sd) 
                                            
                                            ->where('loan.takenDate', '<=', $ed)
                                            // ->where('loan.status', '=', $status) 
                                            ->where('loan.loanTypeId', '=', $type)
                                            // ->orWhere('loan.loanTypeId', '=', 6)   
                                            
                                            ->where('loan.rate', '=', $rate)
                                            // ->where('loan.status', '=', $status) 
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                  
                                            ->get(); 
                                        }else if($status==0 && $type==0 &&$rate!=null&& $ed!=null&&$sd!=null){
                                            $check = DB::table('loan')
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                            ->where('loan.takenDate', '>=', $sd) 
                                            
                                            ->where('loan.takenDate', '<=', $ed)
                                            ->where('loan.rate', '=', $rate)
                                            // ->where('loan.status', '=', $status) 
                                            ->where('loan.loanTypeId', '=', 4)
                                            ->orWhere('loan.loanTypeId', '=', 5)   
                                            ->where('loan.takenDate', '>=', $sd) 
                                            // ->where('loan.status', '=', $status) 
                                            ->where('loan.takenDate', '<=', $ed)
                                            ->where('loan.rate', '=', $rate)
                                            
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                  
                                            ->get(); 
                                        }else if($status==0 && $type==0 &&$rate==null&& $ed!=null&&$sd==null)
                                        {
                                            $check = DB::table('loan')
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                            
                                            
                                            ->where('loan.takenDate', '<=', $ed)
                                            
                                            // ->where('loan.status', '=', $status) 
                                            ->where('loan.loanTypeId', '=', 4)
                                            ->orWhere('loan.loanTypeId', '=', 5)   
                                            
                                            // ->where('loan.status', '=', $status) 
                                            ->where('loan.takenDate', '<=', $ed)
                                            
                                            
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                  
                                            ->get(); 
                                            
                                        }else if($status!=0 && $type==0 &&$rate==null&& $ed!=null&&$sd==null){
                                            $check = DB::table('loan')
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                            
                                            
                                            ->where('loan.takenDate', '<=', $ed)
                                            ->where('loan.status', '=', $status) 
                                            ->where('loan.loanTypeId', '=', 4)
                                            ->orWhere('loan.loanTypeId', '=', 5)   
                                            ->where('loan.takenDate', '<=', $ed)
                                            ->where('loan.status', '=', $status) 
                                            
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                  
                                            ->get(); 
                                            
                                        }else if($status==0 && $type!=0 &&$rate==null&& $ed!=null&&$sd==null)
                                        {
                                            $check = DB::table('loan')
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                            
                                            
                                            ->where('loan.takenDate', '<=', $ed)
                                            // ->where('loan.status', '=', $status) 
                                            ->where('loan.loanTypeId', '=', $type)
                                            
                                            
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                  
                                            ->get(); 
                                        }else if($status==0 && $type==0 &&$rate!=null&& $ed!=null&&$sd==null)
                                        {
                                            $check = DB::table('loan')
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                            
                                            
                                            ->where('loan.takenDate', '<=', $ed)
                                            ->where('loan.rate', '=', $rate)
                                            ->where('loan.loanTypeId', '=', 4)
                                            ->orWhere('loan.loanTypeId', '=', 5)   
                                            ->where('loan.takenDate', '<=', $ed)
                                            ->where('loan.rate', '=', $rate)
                                            
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                  
                                            ->get(); 
                                        }else if($status!=0 && $type==0 &&$rate!=null&& $ed!=null&&$sd!=null)
                                        {
                                            $check = DB::table('loan')
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')  
                                            
                                            
                                            ->where('loan.takenDate', '<=', $ed)
                                            ->where('loan.takenDate', '>=', $sd)
                                            ->where('loan.rate', '=', $rate)
                                            ->where('loan.status', '=', $status) 
                                            ->where('loan.loanTypeId', '=', 4)
                                            ->orWhere('loan.loanTypeId', '=', 5)   
                                            ->where('loan.takenDate', '<=', $ed)
                                            ->where('loan.takenDate', '>=', $sd)
                                            ->where('loan.rate', '=', $rate)
                                            ->where('loan.status', '=', $status) 
                                            
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                  
                                            ->get(); 
                                        }
                                        // }if(($status==0 && $type==0 &&$rate!=null&& $ed!=null&&$sd==null)
                                        // {
                                            
                                            // }
                                            return view("propertyloanreport")->with("ldata", $check);
                                    }
                                        
                                        public function printPDF()
                                        {
                                            $data = DB::table('loan')
                                            ->where('loan.loanTypeId', '=', 4)
                                            ->orWhere('loan.loanTypeId', '=', 5)
                                            ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')     
                                            ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
                                            ->get();
                                          
                                            $returndata = '{"smrydta":[{"statuspaid":"1","arrersamount":"8586","targetamount":"556","collectedamount":"5656","selectedroutename":"5955","selectedrid":"9856","selectdate":"89745"}],"qrydata": '.$data.'}';
                                            
                                            $data = DB::table('customer')
                                            ->get();
                                            
                                            $pdf = PDF::loadView('pdf_view', json_decode($returndata,true));  
                                            return $pdf->download('medium.pdf');
                                        }
                                        
                                    }
                                    