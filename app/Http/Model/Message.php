<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'name', 'email', 'phone','address','title','content','pid','status'
    ];

    protected $hidden = [
        'create_at'
    ];
}
