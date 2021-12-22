<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Control;
use Illuminate\Http\Request;

class UserRegulate extends Controller
{
    public function UserRegulate()
    {
//        return view('admin/userRegulate');
        $t = new Control();
        $t->newEvaluationUser(1,1,1,1,1,1);
    }
}
