<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\UploadedFile;
session_start();
class CustomerController extends Controller
{
    //

    public function newcutomer(Request $request)
    {
        // $filename = Str::random(40);
        // dd($request->all());
        $chreg = $request->creg_num;
        $chnic = $request->cnic;

        $this->validate(
            $request,
            [
                'reg_num' => 'required',
                'fname' => 'required',
                'nic' => 'required|unique:customer,nic',
                'tp1' => 'required|size:10|regex:/(07)[0-9]{8}/',
                'tp2' => 'nullable',
                'customerdetilas' => 'nullable',
                'add1' => 'required',
                'add2' => 'required',
                'city' => 'required',
                // 'image' => 'required|image|mimes:jpeg,png|max:2048',
            ],
            [
                'fname.required' => 'The Customer Name field is required.',
                'nic.required' => 'The Customer NIC field is required.',
                'nic.unique' =>
                    'Already registerd a customer with this NIC Number',
                'reg_num.required' =>
                    'The Customer Register number field is required.',
                'tp1.required' => 'The Customer Mobile field is required.',
                'tp1.size' => 'Please enter valid Mobile.',
                'tp1.regex' => 'Please enter valid Mobile.',
                'add1.required' => 'The Customer Address 1 field is required.',
                'add2.required' => 'The Customer Address 2 field is required.',
                'city.required' => 'The Customer City field is required.',
                // 'image.required' =>
                //     'Please Select a Profile Picture for Customer.',
                // 'image.image' => 'Please Select Image for Profile .',
                // 'image.mimes' => 'The Image Type must be jpg or png .',
                // 'image.max' => 'Please Select imagege file lower than 2Mb .',
            ]
        );



        $data = [];

        $data1['line1'] = $request->add1;
        $data1['line2'] = $request->add2;
        $data1['city'] = $request->city;
        $data1['status'] = '1';
        $address = DB::table('address')->insertGetId($data1);

        $data = [];
        $data['customerNo'] = $request->reg_num;
        $data['nic'] = $request->nic;
        $data['name'] = $request->fname;
        $data['nickname'] = $request->nic_name;
        $data['pno'] = $request->tp1;
        $data['pno2'] = $request->tp2;
        $data['addressId'] = $address;
        $data['email'] = $request->email;
        $data['routeId'] = $request->route_id;
        $data['note'] = $request->customerdetilas;
        $data['customerLevelId'] = $request->customerlevel;
        $data['status'] = '1';
        

        $newtitle;
        $ctitle =  $request->title;

        if ($ctitle==1) {
            # code...
            $newtitle = 'Mr';
        }else if ($ctitle==2) {
            $newtitle = 'Ms';
        }else if ($ctitle==3) {
            $newtitle = 'Mrs';
        }else if ($ctitle==4) {
            $newtitle = 'Rev';
        }else if ($ctitle==4) {
            $newtitle = 'M/S';
        }
        $data['title'] = $newtitle;
        // $image = $request->file('proimage');
        // // if (request()->hasFile('proimage')){
        // $uploadedImage = $request->file('proimage');
        // $imageName = time() . '.' . $image->getClientOriginalExtension();
        // $destinationPath = public_path('images/');
        // $destinationPath1 = 'images/';
        // $uploadedImage->move($destinationPath, $imageName);
        // $newpath = $image->imagePath = $destinationPath1 . $imageName;
        // $data['img'] = $newpath;


        $myimg = $request->file('image');
        $destinationPath = "images/";
      
        $web_capture_part = explode(";base64,", $myimg);
        $image_type_aux = explode("image/", $web_capture_part[0]);
        $image_type = $image_type_aux[0];
      
        $image_base64 = base64_decode($web_capture_part[0]);
        $myimgName = uniqid() . '.png';
      
        $file = $destinationPath . $myimgName;
        file_put_contents($file, $image_base64);

        // }
        DB::table('customer')->insert($data);

        $flg = '1';
        return view('customeradd')->with('flag', $flg);
    }

    public function activeCustomer(Request $request)
    {
        $custid = $request->cusid;

        // $data['cusid'] = $request->cusid;
        DB::update(
            'update customer set status = ? where idcustomer = ?',
            [0, $custid]
        );
            return response()->json($custid);
    }

    public function deactiveCustomer(Request $request)
    {
        $custid = $request->cusid;
        DB::update(
            'update customer set status = ? where idcustomer = ?',
            [1, $custid]
        );
        // DB::table('customer')
        //     ->where('idcustomer', $custid)
        //     ->update(['status' => 0]);
            return response()->json($custid);
    }

    public function viewCustomerDetails(Request $request)
    {
        // $cdata = array();
        $id = $request->cusid;
        // $data = DB::table('customer')->where('idcustomer',$id)->get();

        $data = DB::table('customer')
            ->join('address', 'address.addressId', '=', 'customer.addressId')
            ->join(
                'customerlevel',
                'customerlevel.customerLevelId',
                '=',
                'customer.customerLevelId'
            )
            ->join('route', 'route.routeId', '=', 'customer.routeId')
            ->where('idcustomer', $id)
            ->get();
        return view('customerview')->with('cvmodel', $data);

        return response()->json($data);
    }

    public function updateCustomer(Request $request)
    {
        // $data = array();

        $id = $request->cusid;
        $name = $request->cusname;
        $nicname = $request->cusnickname;
        $tp1 = $request->custp1;
        $tp2 = $request->custp2;
        $email = $request->cusemail;
        $ad1 = $request->cusad1;
        $ad2 = $request->cusad2;
        $city = $request->cuscity;
        $route = $request->cusroute;
        $rank = $request->cusrank;
        $note = $request->cusnote;

        if ($route == 0 && $rank > 0) {
            DB::update(
                'update customer set name = ?,nickname=?,pno=?,pno2=?,email=?,note=?,customerLevelId=? where idcustomer = ?',
                [$name, $nicname, $tp1, $tp2, $email, $note, $rank, $id]
            );
        } elseif ($rank == 0 && $route > 0) {
            DB::update(
                'update customer set name = ?,nickname=?,pno=?,pno2=?,email=?,note=?,routeId=? where idcustomer = ?',
                [$name, $nicname, $tp1, $tp2, $email, $note, $route, $id]
            );
        } elseif ($rank == 0 && $route == 0) {
            DB::update(
                'update customer set name = ?,nickname=?,pno=?,pno2=?,email=?,note=? where idcustomer = ?',
                [$name, $nicname, $tp1, $tp2, $email, $note, $id]
            );
        } else if ($rank >0 && $route >0) {
            # code...
        
            DB::update(
                'update customer set name = ?,nickname=?,pno=?,pno2=?,email=?,note=?,routeId=?,customerLevelId=? where idcustomer = ?',
                [$name, $nicname, $tp1, $tp2, $email, $note, $route, $rank, $id]
            );
        }
        return Redirect::to('/addcustomer');
    }



    public function loadCustomerLoan(Request $request)
    {
        $loanid = $request->loan_id;

        $loandata = DB::table('loan')
            ->where('loanId', $loanid)
            ->get();
        foreach ($loandata as $value) {
            $loantype = $value->loanTypeId;
        }

        if ($loantype == 1) {
            // Darlyloan
            $cdata = array();
            $data1 = DB::table('loan')
            ->join('installment', 'loan.loanId', '=', 'installment.loanId')
            ->where('loan.loanTypeId', '=', 1)
            ->where('loan.loanId', '=', $loanid)
            ->get();
            $paydate;
            $payamo;
            foreach ($data1 as  $value) {

                $paydate = 'Not Paid';
                $payamo = '0';
                $intralmentid = $value->installmentId;
               

               $data2 =  DB::table('installmentpay')->where('installmentId','=',$intralmentid)->get();

                foreach ($data2 as  $value1) {
                    # code...

                    $paydate = $value1->datec;
                    $payamo = $value1->amount;
                    
                }
                
                $date = $value->datec;
                $amount = $value->amount;
                $payamount = $value->paidAmount;
               
                array_push($cdata,[
                    "date"=>$date, 
                    "amount"=>$amount,
                    "paydate"=>$paydate,
                    "payamount"=>$payamo,
                    "index"=>'0',
                   

                ]);

            }
           

            return response()->json($cdata);
            // return view("customerloansummery")->with("loanmodel", $data1);
        } 
        elseif ($loantype == 2) {
            $cdata = array();
            $data1 = DB::table('loan')
            ->join('installment', 'loan.loanId', '=', 'installment.loanId')
            ->where('loan.loanTypeId', '=', 2)
            ->where('loan.loanId', '=', $loanid)
            ->get();
            $paydate;
            $payamo;
            foreach ($data1 as  $value) {

                $paydate = 'Not Paid';
                $payamo = '0';
                $intralmentid = $value->installmentId;
               

               $data2 =  DB::table('installmentpay')->where('installmentId','=',$intralmentid)->get();

                foreach ($data2 as  $value1) {
                    # code...

                    $paydate = $value1->datec;
                    $payamo = $value1->amount;
                    
                }
                
                $date = $value->datec;
                $amount = $value->amount;
                $payamount = $value->paidAmount;
               
                array_push($cdata,[
                    "date"=>$date, 
                    "amount"=>$amount,
                    "paydate"=>$paydate,
                    "payamount"=>$payamo,
                    "index"=>'0',
                   

                ]);

            }
           

            return response()->json($cdata);
        } elseif ($loantype == 3) {
            $cdata = array();
            $paydate;
            $inpayamo;
            $fillamount;


            $monthlyp = DB::table('loanpay')
            ->where('loanId', '=', $loanid)
            ->sum('loanpay.amount');

            $fullamo = DB::table('loan')
            ->where('loanId', '=', $loanid)
            ->get();
            foreach ($fullamo as  $value2) {
               $fillamount = $value2->amount;
            }

            $data1 = DB::table('loan')
            ->join('interest', 'loan.loanId', '=', 'interest.loanId')
            ->where('loan.loanTypeId', '=', 3)
            ->where('loan.loanId', '=', $loanid)
            ->get();
           
            foreach ($data1 as  $value) {
                $paydate = 'Not Paid';
                $inpayamo = '0';
                $interestId = $value->interestId;
                $loanamount = $value->amount;

                $data2 =  DB::table('interestpay')->where('interestId','=',$interestId)->get();

                foreach ($data2 as  $value1) {
                
                    $paydate = $value1->datec;
                    $inpayamo = $value1->paidAmount;
                }
                $date = $value->datec;
                $amount = $value->amount;
                $payamount = $value->paidAmount;
               
                array_push($cdata,[
                    "date"=>$date, 
                    "amount"=>$amount,
                    "paydate"=>$paydate,
                    "payamount"=>$inpayamo,
                    "loanamo"=>$monthlyp,
                    "fullamount"=>$fillamount,
                    "index"=>'1',
                  
                    
                   

                ]);
            }
      
           

            return response()->json($cdata);



        } elseif ($loantype == 4) {
            $cdata = array();
            $data1 = DB::table('loan')
            ->join('installment', 'loan.loanId', '=', 'installment.loanId')
            ->where('loan.loanTypeId', '=', 4)
            ->where('loan.loanId', '=', $loanid)
            ->get();
            $paydate;
            $payamo;
            foreach ($data1 as  $value) {

                $paydate = 'Not Paid';
                $payamo = '0';
                $intralmentid = $value->installmentId;
               

               $data2 =  DB::table('installmentpay')->where('installmentId','=',$intralmentid)->get();

                foreach ($data2 as  $value1) {
                    # code...

                    $paydate = $value1->datec;
                    $payamo = $value1->amount;
                    
                }
                
                $date = $value->datec;
                $amount = $value->amount;
                $payamount = $value->paidAmount;
               
                array_push($cdata,[
                    "date"=>$date, 
                    "amount"=>$amount,
                    "paydate"=>$paydate,
                    "payamount"=>$payamo,
                    "index"=>'0',
                   

                ]);

            }
           

            return response()->json($cdata);
        } elseif ($loantype == 5) {
            $cdata = array();
            $data1 = DB::table('loan')
            ->join('installment', 'loan.loanId', '=', 'installment.loanId')
            ->where('loan.loanTypeId', '=', 5)
            ->where('loan.loanId', '=', $loanid)
            ->get();
            $paydate;
            $payamo;
            foreach ($data1 as  $value) {

                $paydate = 'Not Paid';
                $payamo = '0';
                $intralmentid = $value->installmentId;
               

               $data2 =  DB::table('installmentpay')->where('installmentId','=',$intralmentid)->get();

                foreach ($data2 as  $value1) {
                    # code...

                    $paydate = $value1->datec;
                    $payamo = $value1->amount;
                    
                }
                
                $date = $value->datec;
                $amount = $value->amount;
                $payamount = $value->paidAmount;
               
                array_push($cdata,[
                    "date"=>$date, 
                    "amount"=>$amount,
                    "paydate"=>$paydate,
                    "payamount"=>$payamo,
                    "index"=>'0',
                   

                ]);

            }
           

            return response()->json($cdata);
        } elseif ($loantype == 6) {
       
            $cdata = array();
            $paydate;
            $inpayamo;
            $fillamount;


            $monthlyp = DB::table('loanpay')
            ->where('loanId', '=', $loanid)
            ->sum('loanpay.amount');

            $fullamo = DB::table('loan')
            ->where('loanId', '=', $loanid)
            ->get();
            foreach ($fullamo as  $value2) {
               $fillamount = $value2->amount;
            }

            $data1 = DB::table('loan')
            ->join('interest', 'loan.loanId', '=', 'interest.loanId')
            ->where('loan.loanTypeId', '=', 6)
            ->where('loan.loanId', '=', $loanid)
            ->get();
           
            foreach ($data1 as  $value) {
                $paydate = 'Not Paid';
                $inpayamo = '0';
                $interestId = $value->interestId;
                $loanamount = $value->amount;

                $data2 =  DB::table('interestpay')->where('interestId','=',$interestId)->get();

                foreach ($data2 as  $value1) {
                
                    $paydate = $value1->datec;
                    $inpayamo = $value1->paidAmount;
                }
                $date = $value->datec;
                $amount = $value->amount;
                $payamount = $value->paidAmount;
               
                array_push($cdata,[
                    "date"=>$date, 
                    "amount"=>$amount,
                    "paydate"=>$paydate,
                    "payamount"=>$inpayamo,
                    "loanamo"=>$monthlyp,
                    "fullamount"=>$fillamount,
                    "index"=>'1',
                  
                    
                   

                ]);
            }
      
           

            return response()->json($cdata);
        }

       
    }

    public function loadCustomerdata(Request $request)
    {
        $loanid = $request->cus_id;
        $data1 = DB::table('customer')
            ->join('address', 'address.addressId', '=', 'customer.addressId')
            ->join('route', 'route.routeId', '=', 'customer.routeId')
            ->join(
                'customerlevel',
                'customerlevel.customerLevelId',
                '=',
                'customer.customerLevelId'
            )
            ->where('idcustomer', $loanid)
            ->get();

        return view('cusviewloan')->with('cusmodel', $data1);

        return response()->json($data1);
    }

    public function genaratefilenum(Request $request)
    {

        $price = DB::table('customer')->max('customerNo');

        $newid = $price + 1;
            // if ($price == '') {
            //     $GenId = 'M1';
            //     return response()->json($GenId);
            // } else {
            //     $splitName = explode('M', $price, 2);
            //     $lastindex = $splitName[1];
                
            //     $GenId = 'M' . $newid;
            // }
            return response()->json($newid);
    }
    
}
