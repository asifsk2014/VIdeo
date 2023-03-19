<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    protected $table='auth';

    public $timestamps=false;
}
