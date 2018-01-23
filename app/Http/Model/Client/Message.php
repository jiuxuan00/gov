<?php

namespace App\http\Model\Client;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'name','serial', 'email', 'phone','address','title','content','pid','status','password','sort','type'
    ];

    protected $hidden = [
        'create_at'
    ];
}
