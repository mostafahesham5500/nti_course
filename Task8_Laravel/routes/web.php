<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\titleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route:: middleware("title")->group(function(){
    Route::get('/indexx', [titleController::class,'index']);
    Route::get("session",[titleController::class,"testsession"]);
    Route::get("logout",[titleController::class,"logout"]);
    Route::get('/create', [titleController::class,'Create']);
    Route::post('/store', [titleController::class,'store']);
    Route::get('/delete/{id}', [titleController::class,'delete'])->middleware("nodelete");
});
Route::post("dologin",[titleController::class,"dologin"]);
Route::get("login",[titleController::class,"login"]);