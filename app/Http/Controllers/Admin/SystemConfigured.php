<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemConfigured extends Controller
{
    public function SystemConfigured(Request $request)
    {
        if(empty($request['status']))
        {
            return view('admin/systemConfigured');
        }
        else
        {
            return $this->DoConfigured();
        }
    }

    public function DoConfigured()
    {

        return 1;
    }
}
