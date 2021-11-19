<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserEvaluation extends Controller
{
    public function UserEvaluation()
    {
        $teacherName = "";
        $teacherType = "";
        $tid = "";
        $award = "";
        return view('user/userEvaluation', compact('teacherName',
            'teacherType', 'tid', 'award'));
    }
}
