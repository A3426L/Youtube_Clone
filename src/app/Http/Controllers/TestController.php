<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Movie;

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
        $user_id = $request->user_id;
        $storeThumbnail = $thumbnail->storeAs('/thumbnails', $thumbnail->hashName(),'public');
        $storeVideo = $video->storeAs('/videos', $video->hashName(),'public');

        $video = new Movie();
        $video->title = $title;
        $video->description = $description;
        $video->thumbnail_path = $storeThumbnail;
        $video->file_path = $storeVideo;
        $video->user_id = $user_id;
        $video->save();

        return view('/test-video-upload',compact('storeVideo'));


    }
}
