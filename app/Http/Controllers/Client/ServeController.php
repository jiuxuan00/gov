<?php

namespace App\Http\Controllers\Client;


use App\http\Model\Client\Article;
use App\http\Model\Client\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ServeController extends BaseController
{



    public function index()
    {
        $tpl=$this->getBaseTemplate();

        if($tpl==='pc'){
            $zhfw = Category::where('pid',79)->get(); //综合服务
            $zdbsfw = Category::where('pid',264)->get(); //综合服务
            $ggfw = Category::where('pid',263)->get(); //公共服务
            $fwgr = Category::where('pid',77)->get(); //服务个人
            $fwqy = Category::where('pid',78)->get(); //服务企业
            $xzsp = Category::where('pid',265)->get(); //行政审批
            return view('client.pc.serve.index', compact('zhfw','zdbsfw','ggfw','fwgr','fwqy','xzsp'));
        }else {
            return view('client.wap.serve.index');
        }

    }


    public function lists($pid)
    {
        $tpl=$this->getBaseTemplate();
        if($tpl==='pc') {
            $cateName=Category::find($pid);
            $cateId=$pid;
            $categories=Category::where('pid',$pid)->where('status',1)->get();
            $articles=Article::where('pid',$pid)->where('status',1)->paginate(10);

            return view('client.pc.serve.list',compact('articles','cateName','cateId','categories'));
        }else {
            return view('client.wap.serve.list');
        }
    }

    public function show($pid,$id)
    {
        $tpl=$this->getBaseTemplate();
        if($tpl==='pc') {
            $data=$this->getArticleData($id);
            return view('client.pc.serve.article',compact('data'));
        }else {
            return view('client.wap.serve.article');
        }
    }


}
