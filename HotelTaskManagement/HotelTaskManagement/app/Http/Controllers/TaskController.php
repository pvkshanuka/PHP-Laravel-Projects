<?php

namespace App\Http\Controllers;

use App\emp;
use App\task;
use Carbon\Carbon;
use Datatables;
use Illuminate\Http\Request;
use Validator;
use Log;

class TaskController extends Controller
{
    public function index()
    {
        return view('task');
    }

    public function getdata()
    {
        $tasks = task::all();

        return Datatables::of($tasks)
            ->addColumn('date', function ($tasks) {
                $date = Carbon::parse($tasks->date);
                return $date->toDateString();
            })
            ->addColumn('action', function ($tasks) {
                if ($tasks->status == 1) {
                    return '<a href="#" class="btn btn-xs btn-success complete" id="' . $tasks->id . '"><i class="glyphicon glyphicon-ok"></i>Complete</a>&nbsp;<a href="#" class="btn btn-xs btn-primary edit" id="' . $tasks->id . '"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;<a href="#" class="btn btn-xs btn-danger delete" id="' . $tasks->id . '"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                } else {
                    return '<a href="#" class="btn btn-xs btn-primary edit" id="' . $tasks->id . '"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;<a href="#" class="btn btn-xs btn-danger delete" id="' . $tasks->id . '"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                }
            })
            ->addColumn('status2', function ($tasks) {
                if ($tasks->status == 1) {
                    return '<a href="#" class="badge badge-success ' . $tasks->id . '" style="background-color: orange">Not Completed</a>';
                } else {
                    return '<a href="#" class="badge badge-success ' . $tasks->id . '" style="background-color: deepskyblue">Completed</a>';
                }
            })
            ->addColumn('emp', function ($tasks) {
                $emp = emp::find($tasks->emp_id);
                return $tasks->emp_id . ' ' . $emp->name;
            })
            ->rawColumns(['emp', 'status2', 'action', 'date'])
            ->make(true);
    }

    public function postdata(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'emp_id' => 'required',
            'date' => 'required',
            'venue' => 'required|max:110',
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails()) {
            foreach ($validation->messages()->getMessages() as $field_name => $messages) {
                $error_array[] = $messages;
            }
        } else {
            if ($request->get('button_action') == "insert") {

                $emp = emp::find($request->get('emp_id'));

                if ($emp) {

                    $task = new task([
                        'date' => $request->get('date'),
                        'venue' => $request->get('venue'),
                        'emp_id' => $request->get('emp_id'),
                        'status' => 1,
                    ]);
                    $task->save();
                    $success_output = '<div class="alert alert-success">Task Added</div>';

                } else {
                    $error_array[0] = 'Invalid EMP ID.';
                }

            }

            if ($request->get('button_action') == 'update') {
                $task = task::find($request->get('task_id'));

                if ($task) {

                    $task->date = $request->get('date');
                    $task->venue = $request->get('venue');
                    $task->emp_id = $request->get('emp_id');
                    $task->save();
                    $success_output = '<div class="alert alert-success">Task Updated</div>';
                } else {
                    $error_array[0] = 'Invalid Task ID.';
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
        $id = $request->input('id');
        $task = task::find($id);
        $error_array = array();

        if ($task) {

            $date = Carbon::parse($task->date)->toDateString();

            $output = array(
                'date' => $date,
                'venue' => $task->venue,
                'emp_id' => $task->emp_id,
                'error' => $error_array,
            );
            echo json_encode($output);
        } else {
            $error_array[0] = 'Invalid Task ID.';
            $output = array(
                'error' => $error_array,
            );

            echo json_encode($output);
        }
    }

    public function removedata(Request $request)
    {
        $task = task::find($request->input('id'));

        if ($task) {

            if ($task->delete()) {
                echo 'Data Deleted';
            }

        } else {

            echo 'Invalid Task.';

        }

    }

    public function complete(Request $request)
    {
        $task = task::find($request->input('id'));

        if ($task) {

            if ($task->status = 1) {

                $task->status = 2;
                $task->save();
                echo 'Task Completed Successfuly.!';
            } else {
                echo 'Invalid Task To Complete.';
            }
        } else {
            echo 'Invalid Task ID.';
        }
    }

    public function taskreport()
    {

        return view('taskreport');

    }

    public function viewreport()
    {



        $tasks = task::all();

        $output = '';
        $emp;
        $date;
        $status;

        foreach ($tasks as $task) {
// Log::info("awat");
            $emp = emp::find($task->emp_id);
            $date = Carbon::parse($task->date);

            if ($task->status == 1) {
                $status = 'Not Completed';
            } else {
                $status = 'Completed';
            }

            $output .= '<tr>
            <td>' . $task->id . '</td>
            <td>' . $task->emp_id . ' ' . $emp->name . '</td>
            <td>' . $date->toDateString() . '</td>
            <td>' . $task->venue . '</td>
            <td>'.$status.'</td>
        </tr>';

        }

        echo $output;
    }

}
