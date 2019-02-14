<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Log;
use DB;

class Sponsors extends Model
{
    use SoftDeletes;

    protected $table = 'sponsors';
}
