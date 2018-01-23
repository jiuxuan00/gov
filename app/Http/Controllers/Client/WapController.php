<?php

namespace App\Http\Controllers\Client;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class WapController extends BaseController
{
    //新闻首页
    public function news()
    {
        $tpl = $this->getBaseTemplate();
        if ($tpl === 'pc') {
            return redirect('/');
        } else {
            $focus = DB::select('SELECT * FROM `articles` WHERE `flags` LIKE 1 ORDER BY `id` DESC LIMIT 0,5');
            $data = DB::select('SELECT * FROM `categories` WHERE `pid` = 205');
            foreach ($data as $k => $v) {
                $data[$k]->articles = DB::select('SELECT * FROM `articles` WHERE `pid` LIKE ' . $v->id . ' AND `status` LIKE 1 ORDER BY `id` DESC LIMIT 0,5');
            }
            return view('client.wap.news', compact('focus', 'data'));
        }
    }

    //列表
    public function plus($pid)
    {
        $tpl = $this->getBaseTemplate();
        if ($tpl === 'pc') {
            return redirect('/');
        } else {
            $cate = DB::select('SELECT * FROM `categories` WHERE `id` = ' . $pid)[0];
            $cateChild = DB::table('categories')->where('pid', $cate->id)->count();
            if ($cateChild == 0) {//没有子分类
                $type = 1;
                if($pid==95){//领导之窗
                    $articles = DB::table('articles')->where('pid', $pid)->where('status', 1)->orderBy('id','asc')->paginate(20);
                }else {
                    $articles = DB::table('articles')->where('pid', $pid)->where('status', 1)->orderBy('id','desc')->paginate(20);
                }

            } else {//有子分类
                $type = 2;
                $articles = DB::table('categories')->where('pid', $cate->id)->where('status', 1)->orderBy('id','desc')->paginate(20);
            }
            return view('client.wap.list', compact('cate', 'type', 'articles'));

        }
    }

    //详情
    public function detail($pid, $id)
    {
        $tpl = $this->getBaseTemplate();
        if ($tpl === 'pc') {
            return redirect('/');
        } else {
            $article = DB::select('SELECT * FROM `articles` WHERE `id` = ' . $id)[0];
            return view('client.wap.article', compact('article'));
        }
    }

    //政务公开
    public function government()
    {
        $tpl = $this->getBaseTemplate();
        if ($tpl === 'pc') {
            return redirect('/');
        } else {
            //政府文件
            $zfwj = DB::select('SELECT * FROM `articles` WHERE `pid` LIKE 163 AND `status` = 1 ORDER BY `id` DESC LIMIT 0,5'); //政府文件
            $zfbg = DB::select('SELECT * FROM `articles` WHERE `pid` LIKE 40 AND `status` = 1 ORDER BY `id` DESC LIMIT 0,5'); //政府报告
            $ghjh = DB::select('SELECT * FROM `articles` WHERE `pid` LIKE 53 AND `status` = 1 ORDER BY `id` DESC LIMIT 0,5'); //规划计划
            $zcjd = DB::select('SELECT * FROM `articles` WHERE `pid` LIKE 167 AND `status` = 1 ORDER BY `id` DESC LIMIT 0,5');  //政策解读
            $rdhy = DB::select('SELECT * FROM `articles` WHERE `pid` LIKE 45 AND `status` = 1 ORDER BY `id` DESC LIMIT 0,5');  //热点回应
            return view('client.wap.government', compact('zfwj', 'zfbg', 'ghjh', 'zcjd', 'rdhy'));
        }
    }

    //走进扎兰
    public function zhalan($name)
    {
        $tpl = $this->getBaseTemplate();
        if ($tpl === 'pc') {
            return redirect('/');
        } else {
            if ($name == 'zhalan') {
                $name = 'index';
                $focus = DB::select('SELECT * FROM `articles` WHERE `flags` LIKE 1 ORDER BY `id` DESC LIMIT 0,5');
            } elseif ($name == 'xingzheng') {
                $data = DB::select('SELECT * FROM `articles` WHERE `pid` = 67 AND `status` = 1 ORDER BY `id` DESC LIMIT 0, 20');
            } elseif ($name == 'minzu') {
                $data = DB::select('SELECT * FROM `articles` WHERE `pid` = 69 AND `status` = 1 ORDER BY `id` DESC LIMIT 0, 20');
            } elseif ($name == 'mingpian') {
                $data = DB::select('SELECT * FROM `articles` WHERE `pid` = 602 AND `status` = 1 ORDER BY `id` DESC LIMIT 0, 20');
            }
            return view('client.wap.zhalan.' . $name, compact('data', 'focus'));
        }
    }

    //办事服务
    public function serve()
    {
        $fwgr = DB::select('SELECT * FROM `categories` WHERE `pid` = 77 ORDER BY `id` DESC LIMIT 0, 20'); //服务个人
        $fwqy = DB::select('SELECT * FROM `categories` WHERE `pid` = 78 ORDER BY `id` DESC LIMIT 0, 20'); //服务企业
        $ggfw = DB::select('SELECT * FROM `categories` WHERE `pid` = 263 ORDER BY `id` DESC LIMIT 0, 20'); //公共服务
        $zdbsfw = DB::select('SELECT * FROM `categories` WHERE `pid` = 264 ORDER BY `id` DESC LIMIT 0, 20'); //重点办事服务
        $bmbs = DB::select('SELECT * FROM `categories` WHERE `pid` = 264 ORDER BY `id` DESC LIMIT 0, 20'); //部门办事
        return view('client.wap.serve', compact('fwgr', 'fwqy', 'ggfw', 'zdbsfw', 'bmbs'));
    }

}
