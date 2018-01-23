<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class CustomController extends CommonController
{
    //
    public function cate()
    {
        return view('admin.layouts.selectCates');
    }


}
