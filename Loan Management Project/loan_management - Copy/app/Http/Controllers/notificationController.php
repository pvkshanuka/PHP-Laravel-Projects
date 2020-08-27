<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class notificationController extends Controller
{
    public function loadnotification(Request $request)
    {
        $today = \Carbon\Carbon::now();
        $date = $today->format('Y-m-d');

        $noti = DB::table('checkdetails')
            ->where('realizeDate', '>', $date)
            ->get();

        return response()->json($noti);
    }
}
