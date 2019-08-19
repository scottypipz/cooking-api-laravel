<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function jsonResponse($message, $status_code, $data)
    {
        $payload = [
            'message' => $message,
            'data' => $data
        ];
        return response()->json($payload, $status_code);
    }

    public function jsonSuccess($message='', $status_code=200, $data=[])
    {
        return $this->jsonResponse($message, $status_code, $data);
    }

    public function jsonError($message='', $status_code=500, $data=[])
    {
        return $this->jsonResponse($message, $status_code, $data);
    }
}
