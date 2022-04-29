<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\users;
use App\Models\User;
use App\Models\blog;

class userController extends Controller
{

    function signup(){
        return view('signup',['User' => "Create User"]);
    }

    function storeuser(Request $request){
        $this->validate($request,[
            "name"  => 'required|min:6',
            "email" => "required|email",
            "password"  => 'required|min:6',
        ]);
        $data = $request->all();

        $data['password'] = bcrypt($data['password']);

        $op =  users :: create($data);

        if($op){
            return view('login');
        }else{
            dd('Error Try Again');
        }
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
            $data = blog :: where('added_by',auth()->id())->get();
            // return view("blog/index",['data' => $data]);
            return redirect(url('index'))->with('data', $data);
        }else{
            echo "Invalidate";
        }
    }

    function logout(Request $request){
        auth()->logout();
        return redirect(url('login'));
    }
}
