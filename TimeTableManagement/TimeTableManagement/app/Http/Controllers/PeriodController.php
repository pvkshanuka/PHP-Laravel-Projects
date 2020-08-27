<?php

namespace App\Http\Controllers;

use App\classes;
use App\period;
use App\periodtime;
use App\subject;
use Datatables;
use Illuminate\Http\Request;
use Log;
use Validator;

class PeriodController extends Controller
{
    public function index()
    {
        Log::info("index awa");
        return view('period');
    }

    public function getdata()
    {
        $periods = period::all();

        return Datatables::of($periods)
            ->addColumn('class', function ($periods) {
                $class = classes::find($periods->class_id);
                return $class->class;
            })
            ->addColumn('subject', function ($periods) {
                $subject = subject::find($periods->subject_id);
                return $subject->subject;
            })
            ->addColumn('time', function ($periods) {
                $periodtime = periodtime::find($periods->periodtime_id);
                return $periodtime->time;
            })
            ->addColumn('action', function ($periods) {
                return '<a href="#" class="btn btn-xs btn-primary edit" id="' . $periods->id . '"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;<a href="#" class="btn btn-xs btn-danger delete" id="' . $periods->id . '"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
            })
            ->addColumn('day', function ($periods) {

                switch ($periods->day) {
                    case 1:
                        return "Monday";
                        break;
                    case 2:
                        return "Tuesday";
                        break;
                    case 3:
                        return "Wednesday";
                        break;
                    case 4:
                        return "Thursday";
                        break;
                    case 5:
                        return "Friday";
                        break;
                    default:
                        return 'Invalid Date';
                }

            })
            ->rawColumns(['class', 'subject', 'time', 'action', 'day'])
            ->make(true);
    }

    public function loaddata(Request $request)
    {
        Log::info("loaddata awa");
        $error_array = array();
        $success_output = '';

        $classes = classes::all();
        $subjects = subject::all();
        $periods = periodtime::all();

        $output = array(
            'classes' => $classes,
            'subjects' => $subjects,
            'periods' => $periods,
        );

        echo json_encode($output);

    }

    public function postdata(Request $request)
    {
        Log::info("postdata awa");
        $validation = Validator::make($request->all(), [
            'select_class' => 'required',
            'select_subject' => 'required',
            'select_period' => 'required',
            'select_day' => 'required',

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

                $classes = classes::find($request->get('select_class'));
                $subject = subject::find($request->get('select_subject'));
                $period = periodtime::find($request->get('select_period'));
                $day = $request->get('select_day');

                if ($classes) {
                    if ($subject) {
                        if ($period) {
                            if ($day < 6 && $day > 0) {

                                $allperiod = period::all();
                                $periodcheck = false;
                                Log::info($request->get('select_class') . "-" . $request->get('select_period') . "-" . $request->get('select_day'));
                                foreach ($allperiod as $p) {

                                    Log::info($p->id . "|" . $p->class_id . "-" . $p->periodtime_id);
                                    if ($p->class_id == $request->get('select_class') && $p->periodtime_id == $request->get('select_period') && $p->day == $request->get('select_day')) {
                                        $periodcheck = true;
                                        break;
                                    }

                                }

                                if ($periodcheck) {
                                    $error_array[0] = 'Class Has Subject In This Period.';
                                } else {

                                    $per = new period([
                                        'class_id' => $request->get('select_class'),
                                        'subject_id' => $request->get('select_subject'),
                                        'periodtime_id' => $request->get('select_period'),
                                        'day' => $request->get('select_day'),
                                    ]);
                                    $per->save();
                                    $success_output = '<div class="alert alert-success">Period Added</div>';
                                }
                            } else {
                                $error_array[0] = 'Invalid Day';
                            }
                        } else {
                            $error_array[0] = 'Invalid Period';
                        }
                    } else {
                        $error_array[0] = 'Invalid Subject';
                    }
                } else {
                    $error_array[0] = 'Invalid Class';
                }

            }

            if ($request->get('button_action') == 'update') {
                Log::info("update awa");
                $period = period::find($request->get('period_id'));

                if ($period) {
                    $classes = classes::find($request->get('select_class'));
                    $subject = subject::find($request->get('select_subject'));
                    $periodt = periodtime::find($request->get('select_period'));
                    $day = $request->get('select_day');

                    if ($classes) {
                        if ($subject) {
                            if ($periodt) {
                                if ($day < 6 && $day > 0) {

                                    $allperiod = period::all();
                                    $periodcheck = false;
                                    Log::info($request->get('select_class') . "-" . $request->get('select_period'));
                                    foreach ($allperiod as $p) {

                                        Log::info($p->id . "|" . $p->class_id . "-" . $p->periodtime_id);
                                        if ($p->class_id == $request->get('select_class') && $p->periodtime_id == $request->get('select_period') && $p->day == $request->get('select_day')) {
                                            $periodcheck = true;
                                            break;
                                        }

                                    }

                                    if ($periodcheck) {
                                        $error_array[0] = 'Class Has Subject In This Period.';
                                    } else {

                                        $period->class_id = $request->get('select_class');
                                        $period->subject_id = $request->get('select_subject');
                                        $period->periodtime_id = $request->get('select_period');
                                        $period->day = $request->get('select_day');
                                        $period->save();
                                        $success_output = '<div class="alert alert-success">Period Updated</div>';
                                    }
                                } else {
                                    $error_array[0] = 'Invalid Day';
                                }
                            } else {
                                $error_array[0] = 'Invalid Period';
                            }
                        } else {
                            $error_array[0] = 'Invalid Subject';
                        }
                    } else {
                        $error_array[0] = 'Invalid Class';
                    }
                } else {
                    $error_array[0] = 'Invalid Period.';
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

        $id = $request->input('id');
        $period = period::find($id);
        $error_array = array();

        if ($period) {

            $output = array(
                'class' => $period->class_id,
                'subject' => $period->subject_id,
                'time' => $period->periodtime_id,
                'day' => $period->day,
                'error' => $error_array,
            );
            echo json_encode($output);

        } else {
            $error_array[0] = 'Invalid Period.';
            $output = array(
                'error' => $error_array,
            );

            echo json_encode($output);
        }
    }

    public function removedata(Request $request)
    {
        $period = period::find($request->input('id'));

        if ($period) {
            if ($period->delete()) {
                echo 'Period Deleted.';
            }
        } else {
            echo 'Invalid Period.';
        }
    }

}
