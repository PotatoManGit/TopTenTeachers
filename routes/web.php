<?php

use Illuminate\Support\Facades\Route;

// 引用控制器命名空间
use App\Http\Controllers\Index;
use App\Http\Controllers\User\SignIn;
use App\Http\Controllers\User\User;;

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

Route::any('/', [Index::class, "index"]);

// 用户相关路由
Route::any('/user/sign_in/', [SignIn::class, "SignIn"]);
Route::post('/user/sign_in/check', [SignIn::class, "SignInCheck"]);
Route::any('/user/', [User::class, "User"])
    ->middleware('user_control');//Check cookie

Route::any('/test', function (){
    return view('test');
});
