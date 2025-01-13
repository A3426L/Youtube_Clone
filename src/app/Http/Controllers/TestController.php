<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function home(){
        return view('test-video-upload');
    }

    function upload(Request $request){
        try{
            $request->validate([
                'video' => 'required|mimes:mp4,avi,mov|max:10240'
            ]);
        }catch (validationException $e){
            dd("a");
            return redirect('/tests/home')->with('error',$e->errors());
        }

        

        $path = $request->file('video')->store('videos','pubilc');

        dd($path);

        //dbへ保存

        return view('welcome');


    }
}
