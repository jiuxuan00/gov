<?php

namespace App\http\Model\Client;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    protected $fillable = [
        'name', 'uri', 'logo','status'
    ];

    protected $hidden = [
        'create_at'
    ];
}
