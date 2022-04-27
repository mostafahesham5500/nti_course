<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\title;
class nodelete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->id != auth()->user()->id){
            title :: where("id",$request->id)->delete();
            session()->flash("message","This User Is Deleted");
        }else{
            session()->flash("message","Cant You Delete This User");
        }
        return $next($request);
    }
}
