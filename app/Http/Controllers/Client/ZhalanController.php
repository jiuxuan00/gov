<?php

namespace App\Http\Controllers\Client;

use App\http\Model\Client\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ZhalanController extends BaseController
{

    public function getArticles($pid, $num = 20)
    {
        return DB::select('SELECT * FROM `articles` WHERE `pid` LIKE ' . $pid . ' AND `status` = 1 LIMIT 0, ' . $num);
    }

    //首页
    public function index()
    {

        $tpl = $this->getBaseTemplate();

        if ($tpl === 'pc') {
            $gmlq = $this->getArticles(74); //革命老区
            $zlly = $this->getArticles(601); //扎兰旅游
            $zlmp = $this->getArticles(602); //扎兰名片
            $mytc = $this->getArticles(73); //名优特产
            $mytz = $this->getArticles(69); //民族特征
            $xzqh = $this->getArticles(67); //行政区划
            return view('client.pc.zhalan.index', compact('mytc', 'gmlq', 'zlly', 'zlmp', 'mytz', 'xzqh'));
        } else {
            return view('client.wap.zhalan.index');
        }

    }


    //详情
    public function show($pid,$id)
    {
        $tpl = $this->getBaseTemplate();
        if ($tpl === 'pc') {
            $data = $this->getArticleData($id);
            return view('client.pc.zhalan.article', compact('data'));
        } else {
            return view('client.wap.article');
        }

    }
}
