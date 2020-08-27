<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\event;
use Log;

class EventViewController extends Controller
{
    public function index()
    {
        return view('eventview');
    }

    public function getdata()
    {
        
        Log::info("getdata awa222");
        $error_array = array();
        $success_output = '';
        // $count = 0;

        $events = event::all();

        foreach ($events as $event) {
            // $count++;
            // Log::info($count);
            // if ($count % 3 == 0) {
            //     $success_output .= '<div class="row">';
            // }
          
           

                $success_output .= '<div class="col-md-4" style="padding: 10px">
                <div class="eventview">
                    <center>
                        <h4>'.$event->name.'</h4>
    
                        <h5>1st Place - <b>'.explode("/n", $event->details)[0].'</b></h5>
                        <h5>2nd Place - <b>'.explode("/n", $event->details)[1].'</b></h5>
                        <h5>3rd Place - <b>'.explode("/n", $event->details)[2].'</b></h5>
                    </center>
    
                </div>
            </div>';

            // if ($count % 3 == 0) {
            //     $success_output .= '</div>';
            //     $count = 0;
            // }

        }

        // Log::info($success_output);
        $output = array(
            'error' => $error_array,
            'data' => $success_output,
        );
        echo json_encode($output);
    }
}
