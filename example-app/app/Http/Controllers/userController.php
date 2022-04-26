<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{

    function Store(Request $request){
        // $data =    $this->validate($request, [
        //         "title"     => "required",
        //         "content" => "required|min:50",
        //         "file"    => "required"
        //     ]);
        // dd($request->request);
        echo $request->title."1<br>";
        echo $request->content."2<br>";
        echo $request->file."3<br>";
    }

    function Title(){
        return view('title');
    }



}
