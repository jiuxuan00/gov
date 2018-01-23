<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    public $fillable = [
        'user_id', 'department', 'post_count','post_edit_count','use_count','use_edit_count'
    ];

}
