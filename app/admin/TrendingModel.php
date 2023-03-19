<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class TrendingModel extends Model
{
    protected $table='trending_news';

    public $timestamps=false;
}