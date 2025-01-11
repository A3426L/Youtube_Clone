<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function home(){
        return view('test-video-upload');
    }

    function upload(Request $request){

        $request->validate([
            'video' => 'required|mimes:mp4,avi,mov|max:10240'
        ]);

        $path = $request->file('video')->store('')

    }
}
