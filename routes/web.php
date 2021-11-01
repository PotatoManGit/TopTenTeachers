<?php

use Illuminate\Support\Facades\Route;

// 引用控制器命名空间
use App\Http\Controllers\Index;
use App\Http\Controllers\User\SignIn;

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

Route::get('/', [Index::class, "index"]);
Route::get('/user/sign_in/', [SignIn::class, "SignIn"]);
