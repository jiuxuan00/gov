<?php

namespace App\http\Model\Client;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    public $fillable = [
        'department', 'report', 'adopt','sort','status','type_id'
    ];
}
