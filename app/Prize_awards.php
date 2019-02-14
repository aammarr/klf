<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Log;
use DB;

class Prize_awards extends Model
{
    use SoftDeletes;

    protected $table = 'prize_awards';
}
