<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use DateInterval;
use Carbon\Carbon;

class DailyLoanController extends Controller
{
    public function loanPlan(Request $request)
    {
        $output = '';

        $deatils = [];

        $dbdates = [];
        $date3 = [];

        $dailyAmout = $request->dailyamount;
        $count = $request->count;
        $loanType = $request->loantype;
        $regNum = 1;
        $Name = 'Madu';
        $date;

        // $deatils['amount'] = ['$dailyAmout'];
        // $deatils['name'] = ['$Name'];
        // $deatils['reg'] = ['$regNum'];

        $today = Carbon::parse($request->cdate);
        // $date1 = $today->format('Y-m-d');
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

    public function customerdetails(Request $request)
    {
        $id = $request->cusid;

        $customer = DB::table('customer')
            ->where('status', '=', 1)
            ->where('customerNo', '=', $id)
            ->orWhere('nic', '=', $id)
            ->get();
        $cusdata = [];
        $levelid;

        if ($customer->isEmpty()) {
            // echo 'null result';
            return response()->json([
                'status' => '1',
            ]);
        } else {
            foreach ($customer as $data) {
                $levelid = $data->customerLevelId;

                $cuslevel = DB::table('customerlevel')
                    ->where('customerLevelId', $levelid)
                    ->get();

                foreach ($cuslevel as $level) {
                    array_push($cusdata, [
                        'name' => $data->name,
                        'mobile' => $data->pno,
                        'nic' => $data->nic,
                        'id' => $data->idcustomer,
                        'img' => $data->img,
                        'nic' => $data->nic,
                        'level' => $level->cuslevelname,
                    ]);
                }
            }

            return response()->json($cusdata);
        }
    }

    public function loanHistory(Request $request)
    {
        $id = $request->id;
        $tblehistory = [];

        $value = DB::table('loan')
            ->where('idcustomer', '=', $id)
            ->get();

        return view('modelcuslnhistory')->with('ccmodel', $value);
        // return response()->json(['status'=>$value]);
    }

    public function genarateAutoId(Request $request)
    {
        $GenId;
        $id = $request->tid;

        if ($id == 1) {
            $price = DB::table('loan')
                ->where('loanTypeId', '=', $id)
                ->max('custom_loanId');

            if ($price == '') {
                $GenId = 'D1';
                return response()->json($GenId);
            } else {
                $splitName = explode('D', $price, 2);
                $lastindex = $splitName[1];
                $newid = $lastindex + 1;
                $GenId = 'D' . $newid;
                return response()->json($GenId);
            }
        } elseif ($id == 2) {
            $price = DB::table('loan')
                ->where('loanTypeId', '=', $id)
                ->max('custom_loanId');
            if ($price == '') {
                $GenId = 'M1';
                return response()->json($GenId);
            } else {
                $splitName = explode('M', $price, 2);
                $lastindex = $splitName[1];
                $newid = $lastindex + 1;
                $GenId = 'M' . $newid;
                return response()->json($GenId);
            }
        } elseif ($id == 4) {
            $price = DB::table('loan')
                ->where('loanTypeId', '=', $id)
                ->max('custom_loanId');
            if ($price == '') {
                $GenId = 'L1';
                return response()->json($GenId);
            } else {
                $splitName = explode('L', $price, 2);
                $lastindex = $splitName[1];
                $newid = $lastindex + 1;
                $GenId = 'L' . $newid;
                return response()->json($GenId);
            }
        } elseif ($id == 5) {
            $price = DB::table('loan')
                ->where('loanTypeId', '=', $id)
                ->max('custom_loanId');
            if ($price == '') {
                $GenId = 'VL1';
                return response()->json($GenId);
            } else {
                $splitName = explode('VL', $price, 2);
                $lastindex = $splitName[1];
                $newid = $lastindex + 1;
                $GenId = 'VL' . $newid;
                return response()->json($GenId);
            }
        } elseif ($id == 3 || $id == 6) {
            $price = DB::table('loan')
                ->where('loanTypeId', '=', $id)
                ->max('custom_loanId');
            if ($price == '') {
                $GenId = 'CH1';
                return response()->json($GenId);
            } else {
                $splitName = explode('CH', $price, 2);
                $lastindex = $splitName[1];
                $newid = $lastindex + 1;
                $GenId = 'CH' . $newid;
                return response()->json($GenId);
            }
        }
    }

    public function createloan(Request $request)
    {
        $empid = $request->session()->get('empid');
        $cusid = $request->cid;
        $end = $request->end;
        $type = $request->loantype;
        $opendate = Carbon::parse($request->cdate);
        $datefmt = $opendate->format('Y-m-d');

        $installment = $request->count;
        $dailyamount = $request->dailyamount;
        $loanamount = $request->amount;
        $datecount = $request->count;
        $income = $dailyamount * $datecount - $loanamount;
        $method = $request->paymethod;
        $loanid = $request->loanid;

        $loandetails = [];

        $loandetails['takenDate'] = $datefmt;
        $loandetails['custom_loanId'] = $loanid;
        $loandetails['endDate'] = $end;
        $loandetails['loanTypeId'] = $type;
        $loandetails['idcustomer'] = $cusid;
        $loandetails['status'] = '2';
        $loandetails['amount'] = $loanamount;
        $loandetails['paidAmount'] = '0';
        $loandetails['targetIncome'] = $income;

        $loanid = DB::table('loan')->insertGetId($loandetails);

        $installment = [];
        $installmentdata = [];
        $dateplan = [];

        $dateplan = $request->plan;

        for ($a = 0; $a < count($dateplan); $a++) {
            $installment['amount'] = $dailyamount;
            $installment['datec'] = $dateplan[$a];
            $installment['status'] = '0';
            $installment['loanId'] = $loanid;
            $installment['paidAmount'] = '0';

            array_push($installmentdata, $installment);
        }

        DB::table('installment')->insert($installmentdata);
        $checktransaction = [];

        if ($method == '2') {
            //cheque

            $chequno = $request->chequeno;
            $accid = $request->accid;
            $chequedate = $request->date;

            $cusname = $request->cname;
            $cusnic = $request->nic;

            $checktransaction['checkNo'] = $chequno;
            $loandetails['custom_loanId'] = $loanid;
            $checktransaction['issueDate'] = $datefmt;
            $checktransaction['realizeDate'] = $chequedate;
            $checktransaction['loanId'] = $loanid;
            $checktransaction['accountId'] = $accid;
            $checktransaction['employeeId'] = $empid;
            $checktransaction['description'] =
                'Paid for darly loan,customer Loanid :' . $loanid;
            $checktransaction['status'] = '1';
            $checktransaction['marked'] = '1';
            $checktransaction['amount'] = $loanamount;

            DB::table('chequetransactions')->insert($checktransaction);
        }

        return response()->json($checktransaction);
    }
}
