<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name', 'email', 'address','salary', 'joining_date', 'nid','phone', 'photo'
    ];

}
