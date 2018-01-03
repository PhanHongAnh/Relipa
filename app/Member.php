<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'firstname', 'lastname', 'middlename', 'email', 'phonenumber',
    ];
    protected $dates = ['deleted_at'];
}
