<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    public $fillable = [
        'department', 'report', 'adopt','sort','status','type_id'
    ];
}
