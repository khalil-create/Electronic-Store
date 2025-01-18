<?php
namespace App\Http\Controllers\Api;
trait apiResponseTrait{
    function apiResponse($data = null, $status = null, $msg = null){
        $array = [
            'data' => $data,
            'status' => $status,
            'msg' => $msg
        ];
        return response()->json($array);
    }
}

