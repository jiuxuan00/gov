<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class SearchController extends CommonController
{
    //首页 get
    public function index()
    {
        return view('admin.search');
    }


    //接收搜索条件  post
    public function result(Request $request)
    {
        $type = $request['type'];
        $keyword = $request['keyword'];

        if ($type == 0) {//按文章ID搜索
            $articles = DB::select('SELECT * FROM `articles` WHERE `id` = ' . $keyword);
            if($articles[0]->status==0){
                $articles[0]->status='未审核';
            }elseif($articles[0]->status==1){
                $articles[0]->status='已审核';
            }elseif($articles[0]->status==2){
                $articles[0]->status='已删除';
            }
        }

        if ($type == 1) {//按文章标题搜索
            $articles = DB::select('SELECT * FROM `articles` WHERE `name` LIKE \'%'.$keyword.'%\' LIMIT 0,100');
            foreach ($articles as $k=>$v){
                if($articles[$k]->status==0){
                    $articles[$k]->status='未审核';
                }elseif($articles[$k]->status==1){
                    $articles[$k]->status='已审核';
                }elseif($articles[$k]->status==2){
                    $articles[$k]->status='已删除';
                }
            }
        }

        return $articles;
    }


}
