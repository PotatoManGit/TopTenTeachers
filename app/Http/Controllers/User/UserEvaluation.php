<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TT_teacher;
use Illuminate\Http\Request;

class UserEvaluation extends Controller
{
    public function UserEvaluation()
    {
        $db = new TT_teacher();
        $data = $db->GetAll();
//        return $data[1]->type;
        return view('user/userEvaluation', compact('data'));
    }
}
