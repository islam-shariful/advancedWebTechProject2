<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\QueryException;

class Student extends Model
{
    protected $table = "student";
    public $timestamps = false;
    // const CREATED_AT = "create-time";
    // const UPDATED_AT = "Update_time";

    //protected $primaryKey = "userid";
}
