<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $primaryKey = 'username';
    public $incrementing = false;
    protected $keyType = 'string';
}
