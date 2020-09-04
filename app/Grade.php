<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\QueryException;

class Grade extends Model
{
    protected $table = "grade";
    public $timestamps = false;
    // const CREATED_AT = "create-time";
    // const UPDATED_AT = "Update_time";

    protected $primaryKey = "grade_id";
}
