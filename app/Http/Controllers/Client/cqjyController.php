<?php

namespace App\Http\Controllers\Client;


use App\http\Model\Client\Article;
use App\http\Model\Client\Category;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class cqjyController extends BaseController
{
    public function _getcqjyCate($pid,$num=40)
    {
        return DB::select("SELECT * FROM `categories` WHERE `pid` = '".$pid."' LIMIT 0, ".$num."");
    }


    public function _getcqjyArticles($pid,$num=10)
    {
        return Article::where('pid',$pid)->orderBy('created_at','DESC')->paginate($num);
    }


    public function index()
    {
        $tpl = $this->getBaseTemplate();
        if ($tpl === 'pc') {
            $pid=47;
            $articles=$this->_getcqjyArticles($pid);
            $categories=$this->_getcqjyCate($pid);
            $cateName=Category::where('id',$pid)->first();
            return view('client.pc.cqjy.list',compact('articles','categories','cateName'));
        }else {
            return view('client.wap.news.list');
        }
    }


    public function lists($pid)
    {
        $tpl = $this->getBaseTemplate();
        if ($tpl === 'pc') {
            $articles=$this->_getcqjyArticles($pid);
            $categories=$this->_getcqjyCate($pid);
            $cateName=Category::where('id',$pid)->first();
            return view('client.pc.cqjy.list',compact('articles','categories','cateName'));
        }else {
            return view('client.wap.news.list');
        }
    }

    public function show($pid,$id)
    {
        $tpl = $this->getBaseTemplate();
        if ($tpl === 'pc') {
            $cateName=Category::find($pid);
            $data=Article::where('id',$id)->first();
            return view('client.pc.cqjy.article',compact('data','cateName'));
        }else {
            return view('client.wap.news.article');
        }
    }


}
