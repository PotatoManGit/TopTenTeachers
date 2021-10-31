<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class Index
 * @package App\Http\Controllers
 * 首页控制器
 */

class Index extends Controller
{
    public function index()
    {
        return view('index');
    }
}
