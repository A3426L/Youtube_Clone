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
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'required|mimetypes:video/mp4,video/avi,video/quicktime|max:10240',
        ]);

        $title = $request->title;
        $description = $request->description;
        $thumbnail = $request->file('thumbnail');
        $video = $request->file('video');
        $soreThumbnail = $thumbnail->storeAs('/thumbnails', $thumbnail->hashName(),'public');
        $storeVideo = $video->storeAs('/videos', $video->hashName(),'public');

        return view('/test-video-upload',compact('storeVideo'));


    }
}
