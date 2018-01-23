<?php

namespace App\http\Model;

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
