<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\QueryException;

class Routine extends Model
{
    protected $table = "routine";
    public $timestamps = false;
    // const CREATED_AT = "create-time";
    // const UPDATED_AT = "Update_time";

    protected $primaryKey = "routine_id";
}
