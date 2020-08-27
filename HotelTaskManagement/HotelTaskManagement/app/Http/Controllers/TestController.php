<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\emp;
use Datatables;

class TestController extends Controller
{
    function index(){
        return view('test');

    }

    function getdata(){
        $emps = emp::select('id', 'name');
        return Datatables::of($emps)->make(true);
    }
}
