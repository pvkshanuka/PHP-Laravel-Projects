<?php

namespace App\Http\Controllers;

use App\sport;
use App\student;
use App\studentsport;
use Datatables;
use Illuminate\Http\Request;
use Log;
use Validator;

class SportregmanController extends Controller
{
    public function index()
    {
        return view('sportregman');
    }

    public function getdata()
    {
        $ssports = studentsport::all();

        return Datatables::of($ssports)
            ->addColumn('student', function ($ssports) {

                $student = student::find($ssports->student_id);

                return $student->id . '|' . $student->name;
            })
            ->addColumn('sport', function ($ssports) {
                $sport = sport::find($ssports->sport_id);

                return $sport->id . '|' . $sport->sport;
            })
            ->addColumn('status', function ($ssports) {
                if ($ssports->status == 0) {
                    return '<a href="#" class="badge badge-success " style="background-color: dodgerblue">Pending</a>';
                } else if ($ssports->status == 1) {
                    return '<a href="#" class="badge badge-success " style="background-color: greenyellow">Accepted</a>';
                } else if ($ssports->status == 2) {
                    return '<a href="#" class="badge badge-success " style="background-color: red">Declined</a>';
                }
            })
            ->addColumn('action', function ($ssports) {
                if ($ssports->status == 0) {
                    return '<a href="#" class="btn btn-xs btn-success accept" id="' . $ssports->id . '"><i class="glyphicon glyphicon-ok"></i>Accept</a>&nbsp;<a href="#" class="btn btn-xs btn-danger decline" id="' . $ssports->id . '"><i class="glyphicon glyphicon-remove"></i>Decline</a>&nbsp;<a href="#" class="btn btn-xs btn-info details" id="' . $ssports->id . '"><i class="glyphicon glyphicon-list-alt"></i>Details</a>';
                } else if ($ssports->status == 1) {
                    return '<a href="#" class="btn btn-xs btn-info details" id="' . $ssports->id . '"><i class="glyphicon glyphicon-list-alt"></i>Details</a>';
                } else if ($ssports->status == 2) {
                    return '<a href="#" class="btn btn-xs btn-info details" id="' . $ssports->id . '"><i class="glyphicon glyphicon-list-alt"></i>Details</a>';
                }
            })
            ->rawColumns(['student', 'sport', 'status', 'action'])
            ->make(true);
    }

    public function acceptreg(Request $request)
    {
        Log::info("acceptreg awa");

        $validation = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        $id = $request->input('id');
        $ssport = studentsport::find($id);
        $error_array = array();

        if ($ssport) {

            if ($ssport->status == 0) {

                $ssport->status = 1;
                $ssport->save();

                $output = array(
                    'error' => $error_array,
                );

                echo json_encode($output);
            } else {
                $error_array[0] = 'Invalid Sport Registration To Accept.';
                $output = array(
                    'error' => $error_array,
                );
                echo json_encode($output);
            }

        } else {
            $error_array[0] = 'Invalid Sport Registration ID.';
            $output = array(
                'error' => $error_array,
            );

            echo json_encode($output);
        }
    }

    public function declinereg(Request $request)
    {
        Log::info("declinereg awa");

        $validation = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        $id = $request->input('id');
        $ssport = studentsport::find($id);
        $error_array = array();

        if ($ssport) {

            if ($ssport->status == 0) {

                $ssport->status = 2;
                $ssport->save();

                $output = array(
                    'error' => $error_array,
                );
                echo json_encode($output);
            } else {
                $error_array[0] = 'Invalid Sport Registration To Decline.';
                $output = array(
                    'error' => $error_array,
                );
                echo json_encode($output);
            }

        } else {
            $error_array[0] = 'Invalid Sport Registration ID.';
            $output = array(
                'error' => $error_array,
            );
            echo json_encode($output);
        }
    }

    public function detailsreg(Request $request)
    {
        Log::info("detailsreg awa");

        $validation = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        $id = $request->input('id');
        $ssport = studentsport::find($id);
        $error_array = array();

        if ($ssport) {

            $sport = sport::find($ssport->sport_id);
            $student = student::find($ssport->student_id);

            $output = array(
                'student' => $student->id . '|' . $student->name,
                'sport' => $sport->id . '|' . $sport->sport,
                'leaderq' => $ssport->leaderq,
                'otherq' => $ssport->otherq,
                'error' => $error_array,
            );
            echo json_encode($output);

        } else {
            $error_array[0] = 'Invalid Sport Registration ID.';
            $output = array(
                'error' => $error_array,
            );

            echo json_encode($output);
        }
    }

}
