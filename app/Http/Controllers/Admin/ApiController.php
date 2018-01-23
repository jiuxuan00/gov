<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends CommonController
{
    //选择分类
    public function cate($id)
    {
        $data = DB::select('SELECT * FROM `categories` WHERE `pid` = ' . $id);
        return $data;
    }


}
