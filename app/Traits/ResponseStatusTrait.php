<?php

namespace App\Traits;


trait ResponseStatusTrait
{
    public $successStatus = 200;
    public $failureStatus = 500;
    public $validationFailureStatus = 400;
    public $notAllowedStatus = 401;

    public function successApiResponse($response){
        return response()->json($response,$this->successStatus);
    }
    public function failureApiResponse($response){
        return response()->json($response,$this->successStatus);
    }
    public function validationFailureApiResponse($response){
        return response()->json($response,$this->validationFailureStatus);
    }

    public function notAllowedApiResponse($response){
        return response()->json($response,$this->notAllowedStatus);
    }


}
