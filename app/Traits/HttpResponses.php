<?php
namespace App\Traits;

trait HttpResponses{
    protected function success($data,$message=null,$code=200): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            "status" =>"Consulta realizada con éxito",
            "message"=>$message,
            'data'=>$data,
        ],$code);
    }
    protected function error($data,$message=null,$code): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            "status" =>"Error",
            "message"=>$message,
            'data'=>$data,
        ],$code);
    }
}
