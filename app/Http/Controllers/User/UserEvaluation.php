<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserEvaluation extends Controller
{
    public function UserEvaluation()
    {
        return view('user/userEvaluation');
    }
}
