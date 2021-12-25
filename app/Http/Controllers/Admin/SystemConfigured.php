<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemConfigured extends Controller
{
    public function SystemConfigured()
    {
        $file_path = config_path()."/sjjs_awardSetting.php";

    }
}
