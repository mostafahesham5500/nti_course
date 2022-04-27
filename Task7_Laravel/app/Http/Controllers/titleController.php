<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\title;

class titleController extends Controller
{

    function index(){
            $data = title :: get();
            return view("index",['data' => $data]);
        
    }

    function delete($id){
        return redirect(url("indexx"));
    }


    function Create(){
        
        return view('create',['title' => "Create Title"]);
    }

    function store(Request $request){
     // code ......

        $this->validate($request,[
            "name"  => 'required|min:6',
            "password"  => 'required|min:6',
            "email" => "required|email",
            "image"  => "required|image|mimes:png,jpeg,jpg,ico"
        ]);

        $finalname = uniqid().".".$request->image->extension();

        
        $data = $request->all();
        if($request->image->move(public_path("images"),$finalname)){
            $data['image'] = $finalname;
        }

        $data['password'] = bcrypt($data['password']);

        $op =  title :: create($data);

        if($op){
            dd('Raw Inserted');
        }else{
            dd('Error Try Again');
        }
    }

    function testsession(){
        session()->put("id","444");
        session()->flash("user","mostafa");
        return redirect(url('title'));
    }

    function login(){
        return view("login");
    }

    function dologin(Request $request){
        $data = $this->validate($request,[
            "password"  => 'required',
            "email" => "required|email",
        ]);

        if(auth()->attempt($data)){
            return redirect(url('indexx'));
        }
    }
    
    function logout(Request $request){
        auth()->logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect(url('login'));
    }
}
