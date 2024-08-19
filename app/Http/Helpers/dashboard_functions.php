<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

if ( !function_exists('apiResponse') ) {
    function apiResponse($data= [],$message=null,$status=null):Response
    {
        $array = [
            'data'=>$data,
            'message'=>$message,
            'success'=>$status
        ];
        return response($array);
    }

    function StoreImage($name,$data,$model,$nameImage)
    {
        if (!empty($data[$name])) {
            $model->addMediaFromRequest($name)->toMediaCollection($nameImage);
        }
    }

    function UpdateImage($data,$model,$nameImage)
    {
        if (!empty($data['image'])) {
            $model->clearMediaCollection($nameImage);
            $model->addMediaFromRequest('image')->toMediaCollection($nameImage);
        }
    }
}