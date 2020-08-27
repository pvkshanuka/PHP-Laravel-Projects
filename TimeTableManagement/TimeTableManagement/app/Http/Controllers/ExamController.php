<?php

namespace App\Http\Controllers;

use App\classes;
use App\exam;
use App\examtype;
use App\subject;
use Carbon\Carbon;
use Datatables;
use Illuminate\Http\Request;
use Log;
use Validator;

class ExamController extends Controller
{
    public function index()
    {
        Log::info("index awa");
        return view('exam');
    }

    public function loaddata(Request $request)
    {
        Log::info("loaddata awa");
        $error_array = array();
        $success_output = '';

        $classes = classes::all();
        $subjects = subject::all();
        $etype = examtype::all();

        $output = array(
            'classes' => $classes,
            'subjects' => $subjects,
            'etype' => $etype,
        );

        echo json_encode($output);

    }

    public function getdata()
    {
        $exams = exam::all();

        return Datatables::of($exams)
            ->addColumn('date', function ($exams) {
                $date = Carbon::parse($exams->date);
                return $date->toDateString();
            })
            ->addColumn('class', function ($exams) {
                $class = classes::find($exams->class_id);
                return $class->class;
            })
            ->addColumn('subject', function ($exams) {
                $subject = subject::find($exams->subject_id);
                return $subject->subject;
            })
            ->addColumn('etype', function ($exams) {
                $etype = examtype::find($exams->examtype_id);
                return $etype->type;
            })
            ->addColumn('stime', function ($exams) {
                $stime = Carbon::parse($exams->stime);
                return $stime->format('h:i A');
            })
            ->addColumn('etime', function ($exams) {
                $etime = Carbon::parse($exams->etime);
                return $etime->format('h:i A');
            })
            ->addColumn('action', function ($exams) {
                return '<a href="#" class="btn btn-xs btn-primary edit" id="' . $exams->id . '"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;<a href="#" class="btn btn-xs btn-danger delete" id="' . $exams->id . '"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
            })
            ->rawColumns(['class', 'subject', 'etype', 'stime', 'etime', 'action'])
            ->make(true);
    }

    public function postdata(Request $request)
    {
        Log::info("postdata awa");
        $validation = Validator::make($request->all(), [
            'select_class' => 'required',
            'select_subject' => 'required',
            'select_etype' => 'required',
            'ex_date' => 'required',
            'ex_year' => 'required',
            'ex_stime' => 'required',
            'ex_etime' => 'required',
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
                $etype = examtype::find($request->get('select_etype'));

                if ($classes) {
                    if ($subject) {
                        if ($etype) {

                            $etime = Carbon::createFromFormat('H:i', $request->get('ex_etime'));
                            $stime = Carbon::createFromFormat('H:i', $request->get('ex_stime'));

                            Log::info('select_etype' . $request->get('select_etype'));

                            $exam = new exam([
                                'class_id' => $request->get('select_class'),
                                'subject_id' => $request->get('select_subject'),
                                'examtype_id' => $request->get('select_etype'),
                                'date' => $request->get('ex_date'),
                                'year' => $request->get('ex_year'),
                                'remarks' => $request->get('ex_remarks'),
                                'status' => 1,
                                'stime' => $stime,
                                'etime' => $etime,
                            ]);
                            $exam->save();
                            $success_output = '<div class="alert alert-success">Exam Added</div>';

                        } else {
                            $error_array[0] = 'Invalid Exam Type';
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
                $exam = exam::find($request->get('exam_id'));

                $classes = classes::find($request->get('select_class'));
                $subject = subject::find($request->get('select_subject'));
                $etype = examtype::find($request->get('select_etype'));

                if ($classes) {
                    if ($subject) {
                        if ($etype) {

                            $etime = Carbon::createFromFormat('H:i', $request->get('ex_etime'));
                            $stime = Carbon::createFromFormat('H:i', $request->get('ex_stime'));

                            $exam->class_id = $request->get('select_class');
                            $exam->subject_id = $request->get('select_subject');
                            $exam->examtype_id = $request->get('select_etype');
                            $exam->date = $request->get('ex_date');
                            $exam->year = $request->get('ex_year');
                            $exam->remarks = $request->get('ex_remarks');
                            $exam->stime = $stime;
                            $exam->etime = $etime;

                            $exam->save();
                            $success_output = '<div class="alert alert-success">Exam Updated</div>';

                        } else {
                            $error_array[0] = 'Invalid Exam Type';
                        }
                    } else {
                        $error_array[0] = 'Invalid Subject';
                    }
                } else {
                    $error_array[0] = 'Invalid Class';
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
        $exam = exam::find($id);
        $error_array = array();

        if ($exam) {

            $stime = Carbon::parse($exam->stime)->format('H:i');
            $etime = Carbon::parse($exam->etime)->format('H:i');
            $date = Carbon::parse($exam->date)->toDateString();
            // return $date->toDateString();
            $output = array(
                'class' => $exam->class_id,
                'subject' => $exam->subject_id,
                'etype' => $exam->examtype_id,
                'year' => $exam->year,
                'date' => $date,
                'stime' => $stime,
                'etime' => $etime,
                'remarks' => $exam->remarks,
                'error' => $error_array,
            );
            echo json_encode($output);

        } else {
            $error_array[0] = 'Invalid Exam.';
            $output = array(
                'error' => $error_array,
            );

            echo json_encode($output);
        }
    }

    public function removedata(Request $request)
    {
        $exam = exam::find($request->input('id'));

        if ($exam) {
            if ($exam->delete()) {
                echo 'Exam Deleted.';
            }
        } else {
            echo 'Exam Period.';
        }
    }

}
