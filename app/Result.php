<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\QueryException;

class Result extends Model
{
    protected $table = "result";
    public $timestamps = false;
    // const CREATED_AT = "create-time";
    // const UPDATED_AT = "Update_time";

    protected $primaryKey = "result_id";
}
