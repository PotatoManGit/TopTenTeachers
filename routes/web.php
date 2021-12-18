<?php

use Illuminate\Support\Facades\Route;

// 引用控制器命名空间
use App\Http\Controllers\Index;
use App\Http\Controllers\User\SignIn;
use App\Http\Controllers\User\User;
use App\Http\Controllers\User\UserEvaluation;
use App\Http\Controllers\Test;
use App\Http\Controllers\Admin\Admin;
use App\Http\Controllers\Admin\AdminControl;
use App\Http\Controllers\Admin\ResultView;
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
Route::any('user/evaluation/', [UserEvaluation::class, "UserEvaluation"])
    ->middleware('user_control');
Route::any('user/evaluation/check', [UserEvaluation::class,"CheckEvaluationResult"])
    ->middleware('user_control');

// 管理员相关路由
Route::any('/admin/', [Admin::class, 'Admin'])
    ->middleware('admin_control');
Route::any('admin/control/', [AdminControl::class, 'AdminControl'])
    ->middleware('admin_control');
Route::any('admin/result_view', [ResultView::class, 'ResultView'])
    ->middleware('admin_control');
//Route::any('admin/result_view/show_one', [ResultView::class, 'ViewOne'])
//    ->middleware('admin_control');

Route::any('/test', [Test::class, "Test"]);
