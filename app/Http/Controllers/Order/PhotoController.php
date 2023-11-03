<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;


class PhotoController extends Controller
{
    //

    public function upload(){

        // $validator = validator(request()->all(),[
        //     'orderimg' => 'mimes:jpeg,png,jpg,gif',
        // ]);

        // if($validator->fails()){
        //     return back()->withErrors($validator);
        // }

        $photo = new Photo;
        $photo->order_id = request()->order_id;
        $photo->orderimg = request()->orderimg;
        return  back();
    }
}
