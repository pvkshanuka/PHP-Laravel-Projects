<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OldLoanPayController extends Controller
{
    public function searchloan(Request $request)
    {
        $id = $request->loanid;

        return response()->json($id);
    }
}
