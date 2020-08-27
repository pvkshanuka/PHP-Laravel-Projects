<?php

namespace App\Http\Controllers;

use App\day;
use App\event;
use Carbon\Carbon;
use Datatables;
use Illuminate\Http\Request;
use Log;
use Validator;

class EventController extends Controller
{
    public function index()
    {
        return view('eventadd');
    }

    public function getdata2()
    {
        Log::info("getdata awa111");
        $events = event::all();

        return Datatables::of($events)
            ->addColumn('action', function ($events) {
                return '<a href="#" class="btn btn-xs btn-primary edit" id="' . $events->id . '"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;<a href="#" class="btn btn-xs btn-danger delete" id="' . $events->id . '"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
            })
            ->addColumn('first', function ($events) {
                return explode("/n", $events->details)[0];
            })
            ->addColumn('second', function ($events) {
                return explode("/n", $events->details)[1];
            })
            ->addColumn('third', function ($events) {
                return explode("/n", $events->details)[2];
            })
            ->rawColumns(['action','first','second','third'])
            ->make(true);
    }

    public function postdata(Request $request)
    {
        Log::info("postdata awa");
        $validation = Validator::make($request->all(), [
            'event' => 'required|max:40',
            'first' => 'required',
            'second' => 'required',
            'third' => 'required',
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

                    $event = new event([
                        'name' => $request->get('event'),
                        'details' => $request->get('first')."/n".$request->get('second')."/n".$request->get('third'),
                    ]);
                    $event->save();
                    $success_output = '<div class="alert alert-success">Event Added</div>';


            }

            if ($request->get('button_action') == 'update') {
                Log::info("update awa");
                $event = event::find($request->get('event_id'));

                if ($event) {

                        $event->name = $request->get('event');
                        $event->details = $request->get('first')."/n".$request->get('second')."/n".$request->get('third');
                        $event->save();
                        $success_output = '<div class="alert alert-success">Event Updated</div>';

                } else {
                    $error_array[0] = 'Invalid Event.';
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
            'event' => 'required|max:40',
            'first' => 'required',
            'second' => 'required',
            'third' => 'required',
        ]);

        $id = $request->input('id');
        $event = event::find($id);
        $error_array = array();

        if ($event) {

            $split = explode("/n", $event->details);

            $output = array(
                'event' => $event->name,
                'first' => $split[0],
                'second' => $split[1],
                'third' => $split[2],
                'error' => $error_array,
            );
            echo json_encode($output);

        } else {
            $error_array[0] = 'Invalid Event.';
            $output = array(
                'error' => $error_array,
            );

            echo json_encode($output);
        }
    }

    public function removedata(Request $request)
    {
        $event = event::find($request->input('id'));

        if ($event) {
            if ($event->delete()) {
                echo 'Event Deleted.';
            }
        } else {
            echo 'Invalid Event.';
        }
    }

}
