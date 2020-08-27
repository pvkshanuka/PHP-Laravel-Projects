<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DocumentController extends Controller
{
    public function imagesUpload()
    {
        return view('document');
    }

    public function imagesUploadPost(Request $request)
    {
        $image_code = [];
        $images = $request->file('file');
        $des = $request->desc;
        $save = [];
        $new_name;
        $code = '';
        $deatils = [];

        $image_size;
        $image_ext;
        $image_count = count($images);

        if ($images == '') {
            return response()->json([
                'status' => '1',
            ]);
        }

        for ($a = 0; $a < $image_count; $a++) {
            $image_size = $images[$a]->getSize();
            $image_ext = $images[$a]->getClientOriginalExtension();
            $new_name = rand(123456, 999999) . '.' . $image_ext;
            $images[$a]->move(public_path('images'), $new_name);

            $code .=
                '<div class="col-md-3"  style="margin-bottom:24px;"><img src="/images/' .
                $new_name .
                '" class="img-thumbnail"/></div>';

            $save['documents'] = $new_name;
            $save['loanId'] = '23';
            $save['details'] = $des;
            DB::table('propertydetails')->insert($save);
        }

        $output = [
            'success' => 'Images Uploaded Successfully!',
            'image' => $code,
        ];

        return response()->json($output);
    }
}
