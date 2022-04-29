<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\blogController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route:: middleware("authuser")->group(function(){
    Route::get("index",[blogController::class,"index"])->name('index');
    Route::get("create",[blogController::class,"create"]);
    Route::post('/store', [blogController::class,'store']);
    Route::post('/storeuser', [userController::class,'storeuser']);
    Route::get("logout",[userController::class,"logout"]);
    Route::get('/delete/{id}', [blogController::class,'delete'])->middleware("ValidateDelete");
    Route::get("signup",[userController::class,"signup"]);
});
Route::post("dologin",[userController::class,"dologin"]);
Route::get("login",[userController::class,"login"]);
