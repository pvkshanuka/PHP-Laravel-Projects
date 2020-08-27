<?php

namespace App\Http\Controllers;

use App\emp;
use App\empsession;
use Datatables;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Log;

class SessionController extends Controller
{
    public function index()
    {
        return view('session');
    }

    public function getdata()
    {
        $ses = empsession::all();

        

        return Datatables::of($ses)
            ->addColumn('action', function ($ses) {
                if ($ses->status == 1) {
                    return '<a href="#" class="btn btn-xs btn-success complete" id="' . $ses->id . '"><i class="glyphicon glyphicon-ok"></i>Complete</a>&nbsp;<a href="#" class="btn btn-xs btn-primary edit" id="' . $ses->id . '"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;<a href="#" class="btn btn-xs btn-danger delete" id="' . $ses->id . '"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                } else {
                    return '<a href="#" class="btn btn-xs btn-primary edit" id="' . $ses->id . '"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;<a href="#" class="btn btn-xs btn-danger delete" id="' . $ses->id . '"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                }
            })
            ->addColumn('status2', function ($ses) {
                if ($ses->status == 1) {
                    return '<a href="#" class="badge badge-success ' . $ses->id . '" style="background-color: orange">Not Completed</a>';
                } else {
                    return '<a href="#" class="badge badge-success ' . $ses->id . '" style="background-color: deepskyblue">Completed</a>';
                }
            })
            ->addColumn('emp', function ($ses) {
                $emp = emp::find($ses->emp_id);
                return $ses->emp_id . ' ' . $emp->name;
            })
            ->addColumn('stime2', function ($ses) {
                // $stime = Carbon::createFromFormat('H:i', $ses->stime);
                // return $ses->stime->format('h:i A');
                $stime = Carbon::parse($ses->stime);
                return $stime->format('h:i A');
            })
            ->addColumn('etime2', function ($ses) {
                // $etime = Carbon::createFromFormat('H:i', $ses->etime);
                $etime = Carbon::parse($ses->etime);
                return $etime->format('h:i A');
            })
            ->rawColumns(['etime','stime','emp', 'status2', 'action'])
            ->make(true);
        }
        
        public function postdata(Request $request)
        {
            $validation = Validator::make($request->all(), [
                'emp_id' => 'required',
                'stime' => 'required',
                'etime' => 'required',
                'details' => 'required|max:250',
                ]);
                
                
                $error_array = array();
        $success_output = '';
        if ($validation->fails()) {
            foreach ($validation->messages()->getMessages() as $field_name => $messages) {
                $error_array[] = $messages;
            }
        } else {
            if ($request->get('button_action') == "insert") {
                
                $emp = emp::find($request->get('emp_id'));
                
                if ($emp) {
                    $etime = Carbon::createFromFormat('H:i', $request->get('etime'));
                    $stime = Carbon::createFromFormat('H:i', $request->get('stime'));
                    $ses = new empsession([
                        'emp_id' => $request->get('emp_id'),
                        'stime' => $stime,
                        'etime' => $etime,
                        'details' => $request->get('details'),
                        'status' => 1,
                        ]);
                        $ses->save();
                        $success_output = '<div class="alert alert-success">Session Added</div>';
                        
                    } else {
                        $error_array[0] = 'Invalid EMP ID.';
                    }
                    
                }
                
            if ($request->get('button_action') == 'update') {
                $se = empsession::find($request->get('session_id'));

                if ($se) {
                    
                    $etime = Carbon::createFromFormat('H:i', $request->get('etime'));
                    $stime = Carbon::createFromFormat('H:i', $request->get('stime'));

                    $se->emp_id = $request->get('emp_id');
                    $se->stime = $stime;
                    $se->etime = $etime;
                    $se->details = $request->get('details');
                    $se->save();
                    $success_output = '<div class="alert alert-success">Session Updated</div>';
                } else {
                    $error_array[0] = 'Invalid Session ID.';
                }
            }

        }
        $output = array(
            'error' => $error_array,
            'success' => $success_output,
        );
        echo json_encode($output);
    }

    public function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $se = empsession::find($id);
        $error_array = array();

        if ($se) {

            $stime = Carbon::parse($se->stime)->format('H:i');
            $etime = Carbon::parse($se->etime)->format('H:i');

            $output = array(
                'emp_id' => $se->emp_id,
                'stime' => $stime,
                'etime' => $etime,
                'details' => $se->details,
                'error' => $error_array,
            );
            echo json_encode($output);
        } else {
            $error_array[0] = 'Invalid Session ID.';
            $output = array(
                'error' => $error_array,
            );

            echo json_encode($output);
        }
    }

    public function removedata(Request $request)
    {
        $se = empsession::find($request->input('id'));

        if ($se) {

            if ($se->delete()) {
                echo 'Data Deleted';
            }

        } else {

            echo 'Invalid Session.';

        }

    }

    public function complete(Request $request)
    {
        $se = empsession::find($request->input('id'));

        if ($se) {

            if ($se->status = 1) {

                $se->status = 2;
                $se->save();
                echo 'Session Completed Successfuly.!';
            } else {
                echo 'Invalid Session To Complete.';
            }
        } else {
            echo 'Invalid Session ID.';
        }
    }

    public function sessionreport()
    {

        return view('sessionreport');

    }

    public function viewreport()
    {



        $emeses = empsession::all();

        $output = '';
        $emp;
        $date;
        $status;
        $stime;
        $etime;


        foreach ($emeses as $ses) {

            $emp = emp::find($ses->emp_id);
            $stime = Carbon::parse($ses->stime)->format('h:i A');
            $etime = Carbon::parse($ses->etime)->format('h:i A');

            if ($ses->status == 1) {
                $status = 'Not Completed';
            } else {
                $status = 'Completed';
            }

            $output .= '<tr>
            <td>' . $ses->id . '</td>
            <td>' . $ses->emp_id . ' ' . $emp->name . '</td>
            <td>' . $stime . '</td>
            <td>' . $etime . '</td>
            <td>'.$ses->details.'</td>
            <td>'.$status.'</td>
        </tr>';

        }

        echo $output;
        echo $output;
        echo $output;
        echo $output;
        echo $output;
        echo $output;
        echo $output;
        echo $output;
        echo $output;
        echo $output;
        echo $output;
        echo $output;
        echo $output;
        echo $output;
        echo $output;
        echo $output;

    }

}
