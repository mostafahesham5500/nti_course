<?php

namespace App\Http\Middleware;
use App\Models\blog;

use Closure;
use Illuminate\Http\Request;

class ValidateDelete
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
        $data = blog :: select('end')->where('id',$request->id)->first();
        $userid = blog :: select('added_by')->where('id',$request->id)->first();
        if(strtotime($data->end) <= time() or $userid->added_by != auth()->id()){
            $message = "Error Try Again";
            session()->flash('message', $message);
            return redirect()->back();
        }else{
            $message = "Raw Removed";
            session()->flash('message', $message);
            return $next($request);
        }
    }
}
