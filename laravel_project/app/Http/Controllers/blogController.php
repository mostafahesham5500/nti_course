<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\blog;

class blogController extends Controller
{
    function index(){
        $data = blog :: where('added_by',auth()->id())->get();        
        return view("blog/index",['data' => $data]);
    }

    function create(){
        return view("blog/create");
    }
    
    function delete($id){
        $op = blog :: where('id',$id)->delete();
        return redirect(url("index"));
    }

    function store(Request $request){
        $this->validate($request,[
            "title"   => 'required|min:10',
            "content" => "required|min:50",
            "image"   => "required|image|mimes:png,jpeg,jpg,ico",
            "start"   => "required|date|after_or_equal:today",
            "end"     => "required|date",
        ]);
        $data = $request->all();
        
        $finalname = uniqid().".".$request->image->extension();
        
        $data = $request->all();
        $data["added_by"] = auth()->id();

        if($request->image->move(public_path("images"),$finalname)){
            $data['image'] = $finalname;
        }

        $op =  blog :: create($data);

        if($op){
            return redirect(route('index'));
        }else{
            dd('Error Try Again');
        }
    }
}
