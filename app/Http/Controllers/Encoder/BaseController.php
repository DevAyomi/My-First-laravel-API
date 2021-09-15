<?php

namespace App\Http\Controllers\Encoder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BaseController extends Controller
{
    public function encode(Request $request)
    {
        $text = $request->text;

        $encode_text = Crypt::encrypt($text);

        return response()->json([
            'status' => 'success',
            'message' => 'Your string was successfully encoded',
            'data' =>  $encode_text,
        ]);
    }

    public function decode(Request $request)
    {

        $encoded_text = $request->text;

        try {
            $decoded_text = decrypt($encoded_text);
            return response()->json([
                'status' => 'success',
                'message' => 'Your string was successfully encoded',
                'data' =>  $decoded_text,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'String decoding failed',
                'data' =>  [],
            ]);
        }
    }
}
