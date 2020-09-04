<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\QueryException;

class Notice extends Model
{
    protected $table = "teacher";
    public $timestamps = false;
    // const CREATED_AT = "create-time";
    // const UPDATED_AT = "Update_time";

    protected $primaryKey = "notice_id";
}
