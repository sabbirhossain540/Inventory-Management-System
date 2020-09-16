<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $fillable = [
        'details', 'amount', 'expanse_date'
    ];
}
