<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TT_User extends Model
{
    use HasFactory;

    protected $table = "TT_Teacher";
    public $timestamps = false;
}
