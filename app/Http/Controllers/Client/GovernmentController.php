<?php

namespace App\Http\Controllers\Client;

use App\http\Model\Admin\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GovernmentController extends BaseController
{
    public function getArticleList($pid, $num)
    {
        $data = DB::select("SELECT * FROM `articles` WHERE `pid` LIKE '" . $pid . "' AND `status` = 1 ORDER BY `updated_at` DESC LIMIT 0, " . $num . "");
        return $data;
    }

    public function index()
    {
        $tpl = $this->getBaseTemplate();

        if ($tpl === 'pc') {
            $gwywj = $this->getArticleList(244, 8);  //国务院文件
            $zzqwj = $this->getArticleList(604, 8);  //自治区文件
            $szfwj = $this->getArticleList(605, 8);  //市政府文件
            $rsrm = $this->getArticleList(606, 8);  //人事任免
            $rdhy = $this->getArticleList(45, 8);  //热点回应
            $gkml = $this->getArticleList(38, 8);  //公开目录
            $zfwj = $this->getArticleList(163, 8);  //政府文件
            $zbwj = $this->getArticleList(162, 8);  //政办文件

            $zfbg = $this->getArticleList(247, 8);  //工作报告
            $zfgzbg = $this->getArticleList(705, 4);  //政府工作报告
            $xzxk = $this->getArticleList(704, 4);  //行政许可

            $gkzd = $this->getArticleList(59, 8);  //公开制度
            $gknb = $this->getArticleList(62, 8);  //公开年报
            $cqjy = $this->getArticleList(47, 8);  //农村产权交易中心



//            $notice = (new Article)->getIndexNotice();//通知公告


            return view('client.pc.government.index', compact('gwywj', 'zzqwj', 'szfwj', 'rsrm', 'rdhy', 'gkml', 'zfwj', 'zbwj', 'zfbg', 'notice', 'gkzd', 'gknb', 'cqjy','xzxk','zfgzbg'));
        } else {
            return view('client.wap.government.index');
        }


    }


    //test
    public function test()
    {
        $tpl = $this->getBaseTemplate();

        if ($tpl === 'pc') {
            $gwywj = $this->getArticleList(244, 8);  //国务院文件
            $zzqwj = $this->getArticleList(604, 8);  //自治区文件
            $szfwj = $this->getArticleList(605, 8);  //市政府文件

            $rsrm = $this->getArticleList(606, 8);  //人事任免
            $rdhy = $this->getArticleList(45, 8);  //热点回应
            $gkml = $this->getArticleList(38, 8);  //公开目录

            $zfwj = $this->getArticleList(163, 8);  //政府文件
            $zbwj = $this->getArticleList(162, 8);  //政办文件
            $zfbg = $this->getArticleList(247, 8);  //工作报告

            $gkzd = $this->getArticleList(59, 8);  //公开制度
            $gknb = $this->getArticleList(62, 8);  //公开年报
            $cqjy = $this->getArticleList(47, 8);  //农村产权交易中心

//            $notice = (new Article)->getIndexNotice();//通知公告


            return view('client.pc.government.index', compact('gwywj', 'zzqwj', 'szfwj', 'rsrm', 'rdhy', 'gkml', 'zfwj', 'zbwj', 'zfbg', 'notice', 'gkzd', 'gknb', 'cqjy'));
        } else {
            return view('client.wap.government.index');
        }


    }


    public function lists($pid)
    {
        $tpl = $this->getBaseTemplate();
        if ($tpl === 'pc') {

            if($pid==60){//依申请公开
                return redirect('/ysqgk');
            }

            $articles = DB::table('articles')->where('pid', $pid)->where('status', '1')->orderBy('updated_at', 'desc')->paginate(10);
            $cateName = DB::select('SELECT * FROM `categories` WHERE `id` = ' . $pid)[0];
            if (empty(DB::select('SELECT * FROM `categories` WHERE `pid` = ' . $pid))) {//没有子分类显示同级
                $categories = DB::select('SELECT id,name FROM `categories` WHERE `pid` = '.$cateName->pid.' ORDER BY sort DESC');
                $tplName = 'list';
            } else {//有子分类显示下级
                $categories = DB::select('SELECT * FROM `categories` WHERE `pid` = ' . $cateName->id .' ORDER BY sort DESC');
                $tplName = 'list-one';
            }



//            if (in_array($pid,[633,'266','267','238'])) {//专题聚焦(ID：633)  政府部门信息公开(ID：266) 乡镇街道信息公开(ID：267) 企事业单位信息公开(ID：238)
//                $cateName = DB::select('SELECT * FROM `categories` WHERE `id` = ' . $pid)[0];
//                $categories = DB::select('SELECT * FROM `categories` WHERE `pid` = ' . $pid);
//                $tplName = 'list-one';
//            }else {//显示同级分类
//                $cateName = DB::select('SELECT * FROM `categories` WHERE `id` = ' . $pid)[0];
//                if(empty(DB::select('SELECT * FROM `categories` WHERE `pid` = '.$pid))){//没有子分类显示同级
//                    $categories = DB::table('categories')->where('pid', $cateName->pid)->get(['name','id']);
//                }else{//有子分类显示下级
//                    $categories = DB::select('SELECT * FROM `categories` WHERE `pid` = '.$cateName->id);
//                }
//                $tplName = 'list';
//            }
            return view('client.pc.government.' . $tplName, compact('cateName', 'categories', 'articles'));
        } else {
            return view('client.wap.government.list');
        }
    }

    public function show($pid, $id)
    {
        $tpl = $this->getBaseTemplate();
        if ($tpl === 'pc') {
            $data = $this->getArticleData($id);
            return view('client.pc.government.article', compact('data'));
        } else {
            return view('client.wap.government.article');
        }
    }
}
