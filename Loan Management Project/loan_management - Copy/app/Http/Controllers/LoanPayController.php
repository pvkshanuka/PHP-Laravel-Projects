<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Arr;

class LoanPayController extends Controller
{

    public function customerLoansSearch(Request $request)
    {
        $cid = $request->cid;
        $deatils = [];
        $output = '';
        $Loans = DB::table('loan')->where('idcustomer', $cid)->get();
        foreach ($Loans as $loan) {

            $output .= '
            <tr>
                <td>' . $lid = $loan->loanId . '</td>
                <td>' . $lamount = $loan->amount . '</td>
                <td>' . $ldate = $loan->takenDate . '</td>
                <td><button onclick="selectloan(' . $lid = $loan->loanId . ');" class="btn btn-info">select</button></td>
            </tr>
            ';

            array_push($deatils, $output);
        }

        return response()->json($deatils);
    }

    public function   paynowloan(Request $request)
    {
        $loanid = $request->loanid;
        $empid = $request->empid;
        $amount = $request->payamount;
        $opendate = \Carbon\Carbon::now();
        $datefmt = $opendate->format('Y-m-d');

        $loandetails = [];

        $loandetails['amount'] = $amount;
        $loandetails['datec'] =  $datefmt;
        $loandetails['employeeId'] = $empid;
        $loandetails['status'] = '0';
        $loandetails['loanId'] = $loanid;

        $loanid = DB::table('loanpay')->insertGetId($loandetails);
        return response()->json("sucsess");
    }

    public function loadCustomersLoans(Request $request)
    {
        // $cdata = array();
        $id = $request->cusid;
        // $data = DB::table('customer')->where('idcustomer',$id)->get();

        $data = DB::table('customer')
            ->where('customer.idcustomer', $id)
            ->orWhere('customer.customerNo', $id)
            ->where('customer.status', 1)
            ->first();



        $loan = DB::table('loan')
            ->where('idcustomer', $data->idcustomer)
            ->where('status', 1)
            ->get();

        $data->loans = $loan;

        // $data = DB::table('customer')
        //     ->rightJoin('loan', function ($join) {
        //         $join->on('loan.idcustomer', '=', 'customer.idcustomer')
        //             ->where('loan.status', "!=", 0);
        //     })
        //     ->where('customer.idcustomer', $id)
        //     ->orWhere('customer.customerNo', $id)
        //     ->where('customer.status', 1)
        //     ->get();


        // ->join('loan', 'loan.idcustomer', '=', 'customer.idcustomer')
        // ->join('loan', function ($join) {
        //     $join->on('customer.idcustomer', '=', 'loan.idcustomer')
        //         ->where('loan.status', 1);
        // })

        // dd($data);

        return response()->json($data);
    }

    public function loanCapitalPay(Request $request)
    {

        $this->validate($request, [
            'amount' => 'required|numeric|min:1',
            'loanId' => 'required|numeric',
        ]);

        $id = $request->loanId;
        $amount = $request->amount;

        $errors = [];

        $data = DB::table('loan')
            ->where('loanId', $id)
            ->first();

        if ($data == null) {
            return response()->json(['message' => 'Invalid Loan'], 422);
        }

        if ($data->status != 1) {
            return response()->json(['message' => 'Invalid Loan Status'], 422);
        }

        if ($amount > $data->amount - $data->paidAmount) {
            return response()->json(['message' => 'Invalid Amount to Pay'], 422);
        }

        //             $str = 'In My Caasdasdrt : 11 12 items 97383jdnadf09adf';

        //             $number = preg_replace('/[^0-9]/','',$str);
        //             $letter = preg_replace('/[^a-zA-Z]/','',$str);
        // // return response()->json(preg_replace('/[^0-9]/','',$str)." - ".preg_replace('/[^a-zA-Z]/','',$str));

        DB::table('loan')
            ->where('loanId', $id)
            ->update(['paidAmount' => $data->paidAmount + $amount]);

        $data = array();
        $data['amount'] = $amount;
        $data['datec'] = Carbon::now()->toDateTimeString();
        $data['employeeId'] = 1;
        $data['loanId'] = $id;

        DB::table('loanpay')->insert($data);
    }

    public function loadLoan(Request $request)
    {

        $id = $request->loanId;

        // $data = DB::table('loan')
        //     // ->join('interest as i', 'i.loanId', '=', 'loan.loanId')
        //     // ->Join('interestpay as ip', 'ip.interestId', '=', 'i.interestId')
        //     ->where('loan.loanId', 21)
        //     ->get();



        $data = DB::table('loan')
            ->where('loan.loanId', $id)
            ->where('loan.status', 1)
            ->first();





        $this->addMissingInterestsMonthlyLoans($data);

        $interests = DB::table('interest')
            ->where('loanId', $id)
            ->where('status', 1)
            ->orderBy('datec', 'desc')
            ->get();

        $data->interests = $interests;

        foreach ($interests as $interest) {
            $interest->interestpay = DB::table('interestPay')
                ->where('interestId', $interest->interestId)
                ->get();
        }

        // dd($interests);

        return response()->json($data);
    }

    public function addMissingInterestsMonthlyLoans($loanData)
    {

        $interest = DB::table('interest')
            ->where('loanId', $loanData->loanId)
            ->where('status', 1)
            ->orderBy('datec', 'desc')
            ->first();

        $lastDate = Carbon::parse($interest->datec);

        //check last interest date is before
        if ($lastDate->isAfter(Carbon::now()->endOfDay())) {

            // interest date is NOT OLD
            // return response()->json($loanData);
        } else {

            // interest date is old
            $lastDate->addMonthNoOverflow();

            //calculating interest amount
            $interestAmount = ($loanData->amount - $loanData->paidAmount) / 100 * $loanData->rate;

            //check last interest date+month is before
            if ($lastDate->isAfter(Carbon::now()->endOfDay())) {

                // interest date is NOT OLD
                //save and load data
                $interestData = array();
                $interestData['amount'] = $interestAmount;
                $interestData['paidAmount'] = 0;
                $interestData['datec'] = $lastDate->format('Y-m-d H:i:s');
                $interestData['loanId'] = $loanData->loanId;

                DB::table('interest')->insert($interestData);
            } else {

                // interest date is old
                //save and check again
                $interestData = array();
                $interestData['amount'] = $interestAmount;
                $interestData['paidAmount'] = 0;
                $interestData['datec'] = $lastDate->format('Y-m-d H:i:s');
                $interestData['loanId'] = $loanData->loanId;

                DB::table('interest')->insert($interestData);

                $this->addMissingInterestsMonthlyLoans($loanData);
            }
        }
    }

    public function interestInterOrIstalPay(Request $request)
    {

        $this->validate($request, [
            'amount' => 'required|numeric|min:1',
            'loanId' => 'required|numeric',
        ]);

        $id = $request->loanId;
        $amount = $request->amount;

        $response = "";

        $data = DB::table('loan')
            ->where('loan.loanId', $id)
            ->where('loan.status', 1)
            ->first();

        // check loan is installment payiing one or iterest paying one from type
        if ($data->loanTypeId === 3) {

            $interests = DB::table('interest')
                ->where('loanId', $id)
                ->where('status', 1)
                ->where('amount', '>', 'paidAmount')
                ->orderBy('datec', 'asc')
                ->get();



            $newPayingAmount = null;
            $temp = null;
            foreach ($interests as $interest) {
                if ($interest->amount > $interest->paidAmount) {
                    // $response .= $interest->interestId . " ";
                    // amount to be paid is temp
                    $temp = $interest->amount - $interest->paidAmount;


                    // chech if amount to be paid is gerater than paing amount
                    if ($temp > $amount) {
                        // new paing amount is set as ping amount
                        $newPayingAmount = $amount;
                    } else {
                        // paing amount is ser as to be paid amount
                        $newPayingAmount = $temp;
                    }

                    DB::update(
                        'update interest set paidAmount = ? where interestId = ?',
                        [$interest->paidAmount + $newPayingAmount, $interest->interestId]
                    );

                    $interestPay = array();
                    $interestPay['paidAmount'] = $newPayingAmount;
                    $interestPay['datec'] = Carbon::now()->toDateTimeString();
                    $interestPay['employeeId'] = 13;
                    $interestPay['interestId'] = $interest->interestId;

                    DB::table('interestpay')->insert($interestPay);

                    $amount -= $newPayingAmount;

                    if ($amount == 0) {
                        break;
                    }
                }
            }
            $response = 1;

            // $data->interests = $interests;
        } else {
            return response()->json(['message' => 'Did not coded for this type'], 422);
        }

        return response()->json($response);
    }

    public function previousMonthDate($date)
    {

        return $date->addMonthsNoOverflow();

        // $day = Carbon::create($date->year, $date->month, $date->day, 0);

        // $day -> month = $date -> month -1;

        // if($day -> month == $date -> month -1){
        //     if($day -> day == $date -> day){
        //         return $day;
        //     }else{
        //         return $day -> endOfMonth();
        //     }
        // }else{
        //     $day -> day = 1;
        //     $day -> month = $date -> month -1;
        //     return $day -> endOfMonth();
        // }

        // $day->subMonth();

        // if ($day->month != $date->month) {
        //     return $day;
        // } else {
        //     return $day->subMonth() -> endOfMonth();
        // }

        // $day = Carbon::create($date->year, $date->month, $date->day, 0);

        // $day -> month = $date -> month -1;

        // if($day -> month == $date -> month -1){
        //     return $day;
        // }else{
        //     $day = Carbon::create($date->year, $date->month-1, 15, 0);
        //     return $day ->endOfMonth();
        // }

    }

    public function nextMonthDate($date)
    {

        $day = Carbon::create($date->year, $date->month, $date->day, 0);

        $day->month = $date->month + 1;

        if ($day->month == $date->month + 1) {
            return $day->endOfMonth();
        } else {
            $day = Carbon::create($date->year, $date->month + 1, 15, 0);
            return $day->endOfMonth();
        }


        // $day->addMonth();

        // if ($day->month == $date->month) {
        //     echo "if";
        //     return $day->addMonth() -> endOfMonth();
        // } else {
        //     return $day -> endOfMonth();
        // }
    }
}
