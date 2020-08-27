<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\UploadedFile;
session_start();

class GuarantorController extends Controller
{
    public function newguarantor(Request $request)
    {
        // $filename = Str::random(40);
        // dd($request->all());
       
        $chnic = $request->nic;
      
       
        $this->validate($request,[
        
            'fname' => 'required',
            'nic' => 'required|unique:guarantor,nic',
            'tp1' => 'required|size:10|regex:/(07)[0-9]{8}/',
            'tp2' => 'nullable',
            'customerdetilas' => 'nullable',
            'add1' => 'required',
            'add2' => 'required',
            'city' => 'required',
            'proimage' => 'required|image|mimes:jpeg,png|max:2048',
            
        ],
        [
            'fname.required' => 'The Customer Name field is required.',
            'nic.required' => 'The Customer NIC field is required.',
            'nic.unique' => 'Already registerd a customer with this NIC Number',
           
            'tp1.required' => 'The Customer Mobile field is required.',
            'tp1.size' => 'Please enter valid Mobile.',
            'tp1.regex' => 'Please enter valid Mobile.',
            'add1.required' => 'The Customer Address 1 field is required.',
            'add2.required' => 'The Customer Address 2 field is required.',
            'city.required' => 'The Customer City field is required.',
            'proimage.required' => 'Please Select a Profile Picture for Customer.',
            'proimage.image' => 'Please Select Image for Profile .',
            'proimage.mimes' => 'The Image Type must be jpg or png .',
            'proimage.max' => 'Please Select imagege file lower than 2Mb .',
            
            
        ]);

            
            
            $data = array();
            
                $data1['line1'] = $request->add1;
                $data1['line2'] = $request->add2;
                $data1['city'] = $request->city;
                $data1['status'] = '1';
              
                $address =  DB::table('address')->insertGetId($data1);
                
                
                $data = array();
        
                $data['nic'] = $request->nic;
                $data['name'] = $request->fname;
               
                $data['pno'] = $request->tp1;
                $data['pno2'] = $request->tp2;
                $data['addressId'] = $address;
              
              
                $data['details'] =  $request->customerdetilas;
             
                $data['status'] =  '1';
                
                $image = $request->file('proimage');
                // if (request()->hasFile('proimage')){
                    $uploadedImage = $request->file('proimage');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('images/guarantor/');
                    $destinationPath1 = 'images/guarantor/';
                    $uploadedImage->move($destinationPath, $imageName);
                    $newpath =  $image->imagePath = $destinationPath1 . $imageName;
                    $data['img'] = $newpath;
                    
                    // }
                 
                    DB::table('guarantor')->insert($data);
             
                $flg = "1";

                  return view("guarantoradd")->with("flag", $flg);
    }
    public function viewGuarantorDetails(Request $request)
    {
      
                // $cdata = array();
                $id = $request->cusid;
               
                // $data = DB::table('customer')->where('idcustomer',$id)->get();
              
                $data = DB::table('guarantor')
                ->join('address', 'address.addressId', '=', 'guarantor.addressId') 
                ->where('guarantorId', $id)
                ->get();

       
                                return view("guarantorview")->with("cvmodel", $data);
                                
                                return response()->json($data);
    }

    public function activeGuarantor(Request $request)
    {
                $custid = $request->cusid;
                
                
                // $data['cusid'] = $request->cusid;
                DB::table('guarantor')
                ->where('guarantorId', $custid)
                ->update(['status' => 0]);
                
                
    }
            
    public function deactiveGuarantor(Request $request)
    {
                $custid = $request->cusid;
                
                DB::table('guarantor')
                ->where('guarantorId', $custid)
                ->update(['status' => 1]);
    }
            
  

    public function updateGuarantor(Request $request)
    {
                                
                                // $data = array();
                                
                                $id = $request->cusid;
                                $name = $request->cusname;
                              
                                $tp1 = $request->custp1;
                                $tp2 = $request->custp2;

                               $adId = $request->cusadId;
                                $ad1 = $request->cusad1;
                                $ad2 = $request->cusad2;
                                $city = $request->cuscity;
                              
                                $note = $request->cusnote;



                                
                           
                                    DB::update('update guarantor set name=?,pno=?,pno2=?,details=? where guarantorId = ?',[$name,$tp1,$tp2,$note, $id]);
                                    DB::update('update address set line1=?,line2=?,city=? where addressId = ?',[$ad1,$ad2,$city,   $adId]);
                             
                            
                                return Redirect::to('/addcustomer');
                                
                                
    }

    public function guarantorDetails(Request $request)
    {
       
        $id = $request->gnic;
    

        $output = DB::table('guarantor')
            ->Where('nic', '=', $id)
            ->Where('status', '=', 1)
            ->get();
       
        

        return response()->json($output);
    }
  
}
