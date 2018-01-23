<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends CommonController
{
    /**
     * @ 后台首页
     */
    public function index()
    {
        if ($this->user->role == 0) {
            $default = 'main';
        } else {
            $default = 'article';
        }
        return view('admin.index', compact('default'));
    }

    /**
     * @ 面板
     */
    public function main()
    {
        $userCount = DB::table('users')->count();
        $articleCount = DB::table('articles')->count();
        return view('admin.main',compact('articleCount','userCount'));
    }


}
