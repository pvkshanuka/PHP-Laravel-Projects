<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sport;
use App\student;
use App\studentsport;
use Log;

class ReportController extends Controller
{
    public function index()
    {
        return view('report');
    }

    public function getdata()
    {
        
        Log::info("getdata awa");
        $error_array = array();
        $success_output = '';

        $studentsports = studentsport::orderBy('sport_id', 'asc')->get();

        foreach ($studentsports as $ss) {
            
            $student = student::find($ss->student_id); 
            $sport = sport::find($ss->sport_id); 
           

                $success_output .= '<tr>
                <th scope="row">1</th>
                <td>'.$student->id.'| '.$student->name.'</td>
                <td>'.$sport->sport.'</td>
                <td>
                    <a href="#" class="badge badge-success " "=" ">'.$sport->day.'</a>
                </td>
             </tr>';


        }

        $output = array(
            'error' => $error_array,
            'data' => $success_output,
        );
        echo json_encode($output);
    }

}
