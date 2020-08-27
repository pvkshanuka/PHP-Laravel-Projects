<?php

namespace App\Http\Controllers;

use App\rooms;
use Illuminate\Http\Request;
use Log;

class RoomController extends Controller
{
    public function index()
    {
        return view('room');
    }

    public function getdata(Request $request)
    {

        $error_array = array();
        $success_output = '';
        $count = 0;

        $rooms = rooms::all();

        foreach ($rooms as $room) {
            $count++;
            // Log::info($count);
            if ($count % 4 == 0) {
                $success_output .= '<div class="row">';
            }

            $statusdata = "";

            if ($room->status == 1) {
                $statusdata = '<p class="card-text">Ready</p>
                <button class="btn btn-primary" onclick="reserve(' . $room->id . ')">Reserve</button>';
            } else if ($room->status == 2) {
                $statusdata = '<p class="card-text">Reserved</p>
                <button class="btn btn-primary" onclick="reserve(' . $room->id . ')">Guest In</button>';
            } else if ($room->status == 3) {
                $statusdata = '<p class="card-text">Guest In</p>
                <button class="btn btn-primary" onclick="reserve(' . $room->id . ')">Check Out</button>';
            } else if ($room->status == 4) {
                $statusdata = '<p class="card-text">To Clean</p>
                <button class="btn btn-primary" onclick="reserve(' . $room->id . ')">Clean</button>';
            }

            if ($room->type == "Standard") {

                $success_output .= '<div class="col-md-3">

                    <div style="width:250px; margin:auto; border: 1px solid rgb(207, 207, 207); border-radius: 5px">
                        <img class="card-img-top" width="100%" src="https://www.refreshhikkaduwa.com/components/com_vikbooking/resources/uploads/standered-room-slider-main.jpg" alt="Card image">
                        <div class="card-body" style="padding: 5px">
                            <h4 class="card-title">No ' . $room->no . ' (' . $room->type . ')</h4>
                            ' . $statusdata . '
                        </div>
                    </div>

                </div>';

            } else {

                $success_output .= '<div class="col-md-3">

                    <div style="width:250px; margin:auto; border: 1px solid rgb(207, 207, 207); border-radius: 5px">
                        <img class="card-img-top" width="100%" src="https://www.refreshhikkaduwa.com/components/com_vikbooking/resources/uploads/refresh-deluxe-room-slider-main.jpg" alt="Card image">
                        <div class="card-body" style="padding: 5px">
                        <h4 class="card-title">No ' . $room->no . ' (' . $room->type . ')</h4>
                        ' . $statusdata . '
                        </div>
                    </div>

                </div>';

            }

            if ($count % 4 == 0) {
                $success_output .= '</div><br><br>';
                $count = 0;
            }

        }

        // Log::info($success_output);
        $output = array(
            'error' => $error_array,
            'data' => $success_output,
        );
        echo json_encode($output);
    }

    public function reserve(Request $request)
    {
        // Log::info("awa");
        $error_array = array();
        $success_output = '';

        $room = rooms::find($request->get('id'));

        if ($room) {

            if ($room->status == 1) {

                $room->status = 2;
                $room->save();

                $success_output = 'Room status updated.';

            } else if ($room->status == 2) {

                $room->status = 3;
                $room->save();

                $success_output = 'Room status updated.';

            } else if ($room->status == 3) {

                $room->status = 4;
                $room->save();

                $success_output = 'Room status updated.';

            } else if ($room->status == 4) {

                $room->status = 1;
                $room->save();

                $success_output = 'Room status updated.';

            }

        } else {
            $error_array[0] = 'Invalid Room ID.';
        }

        // Log::info($success_output);
        $output = array(
            'error' => $error_array,
            'data' => $success_output,
        );
        echo json_encode($output);
    }

}
