<?php

namespace App\Http\Controllers\Client;


use App\http\Model\Client\Article;
use App\http\Model\Client\Category;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewsController extends BaseController
{
    public function _getNewsCate($pid, $num = 40)
    {
        return DB::select("SELECT * FROM `categories` WHERE `pid` = '" . $pid . "' AND `status` = 1 LIMIT 0, " . $num . "");
    }


    public function _getNewsArticles($pid, $num = 10)
    {
        return Article::where('pid', $pid)->where('status',1)->orderBy('created_at', 'DESC')->paginate($num);
    }


    public function index()
    {
        $tpl = $this->getBaseTemplate();
        if ($tpl === 'pc') {
            $pid = 205;
            $articles = $this->_getNewsArticles($pid);
            $categories = $this->_getNewsCate($pid);
            $cateName = Category::where('id', $pid)->first();
            return view('client.pc.news.list', compact('articles', 'categories', 'cateName'));
        } else {
            return view('client.wap.news.list');
        }
    }


    public function lists($pid)
    {
        $tpl = $this->getBaseTemplate();
        if ($tpl === 'pc') {
            $articles = $this->_getNewsArticles($pid);
            $categories = $this->_getNewsCate($pid);
            $cateName = Category::where('id', $pid)->first();
            return view('client.pc.news.list', compact('articles', 'categories', 'cateName'));
        } else {
            return view('client.wap.news.list');
        }
    }

    public function show($pid, $id)
    {
        $tpl = $this->getBaseTemplate();
        if ($tpl === 'pc') {
            $data = $this->getArticleData($id);
            return view('client.pc.news.article', compact('data'));
        } else {
            return view('client.wap.news.article');
        }
    }


}
