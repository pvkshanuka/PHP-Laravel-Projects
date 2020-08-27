<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PayLoansController extends Controller
{
    //
    
    public function searchLoanInstallment(Request $request)
    {
        
        $this->validate($request,[
            'lnid' => 'required|exists:loan,custom_loanId',
        ],
        [             
            'lnid.required' => 'Loan ID is Required',
            'lnid.exists' => 'Loan ID is Incorrect',
            
            ]);


            $data = DB::table('loan')
            ->where('loanId', $request->lnid)
            ->join('customer','customer.idcustomer','=','loan.idcustomer')
            ->select('loan.*','customer.name as cusname','customer.customerLevelId as cuslevel','customer.img as cusimg')
            ->first();
            
            // dd($request->all());
            
            
            // $returndata = '{"smrydta":[{"statuspaid":"0","arrersamount":"'.$arrersamount.'","targetamount":"'.$targetamount.'","collectedamount":"'.$Collectedamount.'","selectedroutename":"'.$rname.'","selectedrid":"'.$request->routrcsh.'","selectdate":"'.$date.'"}],"qrydata": '.$check.'}';
                // return view("cashhandoveraccept")->with("cshsmry", json_decode($returndata,true));
                return view("loanpayinstallment")->with("installmentpy", $data);
            
            return redirect()->back();
    }
        public function payLoanInstallment(Request $request)
        {
            // Log::info('Log message', array('context' => 'payLoanInstallment'));
            
            return redirect()->back();
        }
        
    }
    