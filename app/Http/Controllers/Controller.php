<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendResponse($data, $message = "")
    {
        return response()->json([
            "data" => $data,
            "message" => $message,
            "success" => true,
        ]);
    }

    public function sendError($message, $status = 500, $data = null)
    {
        return response()->json([
            "data" => $data,
            "message" => $message,
            "success" => false,
        ], $status);
    }
}
