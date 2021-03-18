<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function getPrintProofData(Request $request)
    {
        $postData = $request->all();
        return response()->json([
            "data" => $postData,
        ], 201);
    }
}
