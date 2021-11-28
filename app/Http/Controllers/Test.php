<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    public function Test()
    {
        return config('sjjs_teacherSetting.teacherType1');
    }
}
