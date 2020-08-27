<?php

namespace App\Http\Controllers;

use App\subject;
use App\periodtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;
use Validator;

class TimetableController extends Controller
{
    public function index()
    {
        Log::info("index awa");
        return view('timetable');
    }

    public function getdata(Request $request)
    {

        Log::info("getdata awa " . $request->get('id'));
        $validation = Validator::make($request->all(), [
            'id' => 'required',

        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails()) {
            foreach ($validation->messages()->getMessages() as $field_name => $messages) {
                $error_array[] = $messages;
            }
        } else {

            $periods = DB::table('periods')->where('class_id', $request->get('id'))->get();

            $data = array();

            for ($x = 1; $x < 9; $x++) {
                for ($y = 1; $y < 6; $y++) {
                    // Log::info($x . "|" . $y);
                    $data[$x][$y] = "-";
                }
            }

            foreach ($periods as $period) {

                $subname = subject::find($period->subject_id)->subject;
                $data[$period->periodtime_id][$period->day] = subject::find($period->subject_id)->subject;

            }

            // Log::info($data);

            for ($x = 1; $x < 9; $x++) {
                
                $success_output .= '<tr><th scope="row">'.periodtime::find($x)->time.'</th>';
                for ($y = 1; $y < 6; $y++) {
                    // Log::info($x . "|" . $y);
                    $success_output .= '<td>' . $data[$x][$y] . '</td>';

                }
                $success_output .= '</tr>';

            }

        }

        $output = array(
            'error' => $error_array,
            'data' => $success_output,
        );
        echo json_encode($output);
    }

}
