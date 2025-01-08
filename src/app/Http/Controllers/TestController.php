<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function upload(){
        return view('test-video-upload');
    }
}
