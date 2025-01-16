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

        $validator = Validator::make($request->all(), [
            'video' => 'required|mimetypes:video/mp4,video/avi,video/quicktime|max:10240'
        ]);
        $video = $request->file('video');
        $storeVideo = $video->storeAs('/videos', $video->hashName(),'public');
        dd($storeVideo);


        return view('/test-video-upload',compact('storeVideo'));


    }
}
