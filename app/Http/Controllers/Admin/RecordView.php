<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TT_result;
use App\Models\TT_teacher;
use App\Models\TT_user;
use Illuminate\Http\Request;

class RecordView extends Controller
{
    public function RecordView(Request $request)
    {
        $dbu = new TT_user();
        $dbt = new TT_teacher();
        $dbr = new TT_result();
        $data = $dbr->GetAllDataToPaging(20);
        $data->fragment('userList');
        if(empty($request['page']))
            $page = 1;
        else
            $page = (int)$request['page'];
        return view('admin/recordView', compact('data', 'dbt', 'dbu', 'page'));
    }
}
