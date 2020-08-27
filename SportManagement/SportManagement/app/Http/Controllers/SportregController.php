<?php

namespace App\Http\Controllers;

use App\sport;
use App\student;
use App\studentsport;
use Illuminate\Http\Request;
use Log;
use Validator;

class SportregController extends Controller
{
    public function index()
    {
        return view('sportreg');
    }

    public function setstses(Request $request)
    {
        Log::info("setstses awa");

        $validation = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        $id = $request->input('id');
        $student = student::find($id);
        $error_array = array();

        if ($student) {

            $output = array(
                'id' => $student->id,
                'name' => $student->name,
                'error' => $error_array,
            );

            session(['student' => $student]);

            // Log::info(session('student')->name);

            echo json_encode($output);

        } else {
            $error_array[0] = 'Invalid Student ID.';
            $output = array(
                'error' => $error_array,
            );

            echo json_encode($output);
        }
    }

    public function loadsports(Request $request)
    {
        Log::info("loadsports awa");

        $sports = sport::all();

        $data = array();

        foreach ($sports as $s) {
            $sport = array(
                'id' => $s->id,
                'sport' => $s->sport,
            );
            array_push($data, $sport);
            // log::info($s->sport);
            // log::info($sport->id);
        }

        echo json_encode($data);

    }

    public function savedata(Request $request)
    {
        Log::info("savedata awa");
        $validation = Validator::make($request->all(), [
            'sport_select' => 'required',
            'leaderq' => 'required|max:240',
            'otherq' => 'required|max:240',
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails()) {
            foreach ($validation->messages()->getMessages() as $field_name => $messages) {
                $error_array[] = $messages;
            }
        } else {

            $sport = sport::find($request->get('sport_select'));

            if ($sport) {
                Log::info("sport check ok awa");

                if (session()->has('student') && !empty(session()->get('student'))) {

                    $sportst = new studentsport([
                        'student_id' => session()->get('student')->id,
                        'sport_id' => $request->get('sport_select'),
                        'leaderq' => $request->get('leaderq'),
                        'otherq' => $request->get('otherq'),
                        'status' => 0,
                    ]);
                    $sportst->save();
                    $success_output = '<div class="alert alert-success">Registration Success</div>';

                } else {
                    $error_array[0] = 'Please Signed IN.';
                }

            } else {
                Log::info("sport check NOT ok awa");
                $error_array[0] = 'Invalid Sport.';
            }
        }
        $output = array(
            'error' => $error_array,
            'success' => $success_output,
        );
        echo json_encode($output);
    }

}
