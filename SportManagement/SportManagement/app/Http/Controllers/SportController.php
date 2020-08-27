<?php

namespace App\Http\Controllers;

use App\day;
use App\sport;
use Carbon\Carbon;
use Datatables;
use Illuminate\Http\Request;
use Log;
use Validator;

class SportController extends Controller
{
    public function index()
    {
        return view('sport');
    }

    public function getdata()
    {
        $sports = sport::all();

        return Datatables::of($sports)
            ->addColumn('day', function ($sports) {
                    return '<a href="#" class="badge badge-success "">'.$sports->day.'</a>';
            })
            ->addColumn('action', function ($sports) {
                return '<a href="#" class="btn btn-xs btn-primary edit" id="' . $sports->id . '"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;<a href="#" class="btn btn-xs btn-danger delete" id="' . $sports->id . '"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
            })
            ->addColumn('time', function ($sports) {
                $time = Carbon::parse($sports->time);
                return $time->format('h:i A');
            })
            ->rawColumns(['day', 'action'])
            ->make(true);
    }

    public function postdata(Request $request)
    {
        Log::info("postdata awa");
        $validation = Validator::make($request->all(), [
            'sport' => 'required|max:40',
            'time' => 'required',
            'day' => 'required',
            'venue' => 'required',
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails()) {
            foreach ($validation->messages()->getMessages() as $field_name => $messages) {
                $error_array[] = $messages;
            }
        } else {
            if ($request->get('button_action') == "insert") {
                Log::info("insert awa");

                // $day = day::find($request->get('day'));
                $day = "noday";

                if ($request->get('day') == 1) {
                    $day = 'Monday';
                } else if ($request->get('day') == 2) {
                    $day = 'Tuesday';
                } else if ($request->get('day') == 3) {
                    $day = 'Wednesday';
                } else if ($request->get('day') == 4) {
                    $day = 'Thursday';
                } else if ($request->get('day') == 5) {
                    $day = 'Friday';
                } else if ($request->get('day') == 6) {
                    $day = 'Saturday';
                } else if ($request->get('day') == 7) {
                    $day = 'Sunday';
                }

                if ($day != 'noday') {

                    $time = Carbon::createFromFormat('H:i', $request->get('time'));
                    Log::info($request->get('venue'));
                    $sport = new sport([
                        'sport' => $request->get('sport'),
                        'time' => $time,
                        'day' => $day,
                        'venu' =>$request->get('venue'),
                    ]);
                    $sport->save();
                    $success_output = '<div class="alert alert-success">Sport Added</div>';

                } else {
                    $error_array[0] = 'Invalid Day';
                }

            }

            if ($request->get('button_action') == 'update') {
                Log::info("update awa");
                $sport = sport::find($request->get('sport_id'));

                if ($sport) {

                    $time = Carbon::createFromFormat('H:i', $request->get('time'));

                    $day = "noday";

                    if ($request->get('day') == 1) {
                        $day = 'Monday';
                    } else if ($request->get('day') == 2) {
                        $day = 'Tuesday';
                    } else if ($request->get('day') == 3) {
                        $day = 'Wednesday';
                    } else if ($request->get('day') == 4) {
                        $day = 'Thursday';
                    } else if ($request->get('day') == 5) {
                        $day = 'Friday';
                    } else if ($request->get('day') == 6) {
                        $day = 'Saturday';
                    } else if ($request->get('day') == 7) {
                        $day = 'Sunday';
                    }
                    if ($day != 'noday') {

                        $sport->sport = $request->get('sport');
                        $sport->time = $time;
                        $sport->day = $day;
                        $sport->save();
                        $success_output = '<div class="alert alert-success">Sport Updated</div>';

                    } else {
                        $error_array[0] = 'Invalid Day';
                    }

                } else {
                    $error_array[0] = 'Invalid Sport.';
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
        Log::info("fetchdata awa");

        $validation = Validator::make($request->all(), [
            'sport' => 'required|max:40',
            'time' => 'required',
            'day' => 'required',
            'id' => 'required',
        ]);

        $id = $request->input('id');
        $sport = sport::find($id);
        $error_array = array();

        if ($sport) {

            $time = Carbon::parse($sport->time)->format('H:i');

            $day = 0;

                    if (strcmp($sport->day,'Monday')==0) {
                        $day = 1;
                    } else if (strcmp($sport->day,'Tuesday')==0) {
                        $day = 2;
                    } else if (strcmp($sport->day,'Wednesday')==0) {
                        $day = 3;
                    } else if (strcmp($sport->day,'Thursday')==0) {
                        $day = 4;
                    } else if (strcmp($sport->day,'Friday')==0) {
                        $day = 5;
                    } else if (strcmp($sport->day, 'Saturday')==0) {
                        $day = 6;
                    } else if (strcmp($sport->day,'Sunday')==0) {
                        $day = 7;
                    }

            $output = array(
                'sport' => $sport->sport,
                'time' => $time,
                'venue' => $sport->venu,
                'day' => $day,
                'error' => $error_array,
            );
            echo json_encode($output);

        } else {
            $error_array[0] = 'Invalid Sport.';
            $output = array(
                'error' => $error_array,
            );

            echo json_encode($output);
        }
    }

    public function removedata(Request $request)
    {
        $sport = sport::find($request->input('id'));

        if ($sport) {
            if ($sport->delete()) {
                echo 'Sport Deleted.';
            }
        } else {
            echo 'Invalid Sport.';
        }
    }

}
