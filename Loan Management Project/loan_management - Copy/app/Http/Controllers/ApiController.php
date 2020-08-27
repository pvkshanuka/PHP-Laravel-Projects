<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;
use DB;

class ApiController extends Controller
{
    function list(){

        $check = DB::table('loan')
        ->where('loan.loanTypeId', '=', 1)
        ->join('customer', 'customer.idcustomer', '=', 'loan.idcustomer')     
        ->select('customer.nic as cnic','customer.name as cname','loan.rate as lrate','loan.takenDate as ldate','loan.endDate as edate','loan.amount as lamount','loan.paidAmount as lpaidamount','loan.status as lstatus','loan.loanTypeId as ltype')                                                
        ->get();

        return $check;
    }
}
