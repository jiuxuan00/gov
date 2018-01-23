<?php

namespace App\http\Model;


use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    //批量赋值白名单
    public $fillable = [
        'user_id', //用户ID
        'department', //部门
        'post_count', //报送量
        'post_edit_count', //修改报送量
        '‭post_view_count', //前台展示报送量
        'use_count', //采用量
        'use_edit_count', //修改采用量,
        'use_view_count', //前台展示采用量
    ];
}
