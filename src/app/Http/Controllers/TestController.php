<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    function home(){
        return view('test-video-upload');
    }

    function upload(Request $request){

        // dd($request->all());

        // $validator = Validator::make($request->all(), [
        //     'video' => 'required|mimetypes:video/mp4,video/avi,video/quicktime|max:10240'
        // ]);
        
        // if ($validator->fails()) {
        //     dd($validator->errors()->toArray()); // エラーを手動で取得して処理
        // }


        

        $path = $request->file('video')->store('videos','pubilc');

        dd($path);

        //dbへ保存

        return view('welcome');


    }
}
