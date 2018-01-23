<?php

namespace App\Http\Controllers\Client;


use App\http\Model\Client\Article;
use App\http\Model\Client\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class IndexController extends BaseController
{

    public function _getArticleList($pid, $num)
    {
        return DB::select("SELECT * FROM `articles` WHERE `pid` LIKE '" . $pid . "' AND `status` = 1 ORDER BY `created_at` DESC LIMIT 0, " . $num . "");
    }

    //首页
    public function index()
    {
        $tpl = $this->getBaseTemplate();
        $focus = (new Article)->getFlagsArticles(1);  //轮播图
        if ($tpl === 'pc') {
            $todayZhalan = (new Article)->getIndexTodayZhalan();  //今日扎兰

            $state = (new Article)->getIndexState();//国务院政策信息
            $respond = (new Article)->getIndexRespond();//回应关切
            $notice = (new Article)->getIndexNotice();//通知公告

            $government = (new Article)->getIndexGovernment();//政务公开

            $tourism = (new Article)->getIndexTourism(); //休闲旅游
            $investment = (new Article)->getIndexTourism(); //休闲旅游

            $lyjd = $this->_getArticleList(81, 5); //旅游景点
            $czxy = $this->_getArticleList(84, 5); //吃住行娱
            $tcgw = $this->_getArticleList(73, 5); //特产购物

            $tzhj = $this->_getArticleList(249, 5); //投资环境
            $zsxm = $this->_getArticleList(250, 5); //招商项目
            $tzcb = $this->_getArticleList(251, 5); //投资成本
            $tzcx = $this->_getArticleList(252, 5); //投资程序
            $dcgw = $this->_getArticleList(85, 5); //投资程序

            $toutiao = $this->_getArticleList(726,1); //头条



            $subGov = DB::select('select (s.use_count + s.use_edit_count) as p ,s.* from submissions s WHERE `status` = 1 ORDER BY p desc');//政府部门
            $subXzqy = DB::select('select (s.use_count + s.use_edit_count) as p ,s.* from submissions s WHERE `status` = 2 ORDER BY p desc'); //乡镇企业

            return view('client.pc.index', compact('government', 'tourism', 'investment', 'todayZhalan', 'state', 'respond', 'notice', 'focus', 'lyjd', 'czxy', 'tcgw', 'tzhj', 'zsxm', 'tzcb', 'tzcx', 'dcgw', 'subGov', 'subXzqy','toutiao'));
        } else {

            $tab1 = [
                'data1' => DB::table('articles')->where('pid', 211)->orderBy('updated_at', 'desc')->take(5)->get(), //政务要闻
                'data2' => DB::table('articles')->where('pid', 212)->orderBy('updated_at', 'desc')->take(5)->get(), //部门动态
                'data3' => DB::table('articles')->where('pid', 213)->orderBy('updated_at', 'desc')->take(5)->get(), //乡镇之窗
                'data4' => DB::table('articles')->where('pid', 214)->orderBy('updated_at', 'desc')->take(5)->get(), //视频新闻
                'data5' => DB::table('articles')->where('pid', 215)->orderBy('updated_at', 'desc')->take(5)->get(), //通知公告
            ];

            $tab2 = [
                'data1' => DB::table('articles')->where('pid', 51)->orderBy('updated_at', 'desc')->take(5)->get(), //工作报告
                'data2' => DB::table('articles')->where('pid', 163)->orderBy('updated_at', 'desc')->take(5)->get(), //政府文件
                'data3' => DB::table('articles')->where('pid', 45)->orderBy('updated_at', 'desc')->take(5)->get(), //热点回应
            ];

            return view('client.wap.index', compact('focus', 'tab1', 'tab2'));
        }

    }

    //政务公开
    public function government()
    {
        $governments = $this->_getArticles(36);
        return view('client.pc.government.index', compact('governments'));
    }

    //互动平台
    public function interactive()
    {
        return view('client.pc.interactive');
    }

    //新闻资讯
    public function news()
    {
        return view('client.pc.news');
    }

    //在线服务
    public function serve()
    {
        return view('client.pc.serve');
    }

    //列表
    public function artlist($id)
    {
        $category = Category::where('id', $id)->first();
        $data = Article::where('pid', $id)->where('status', 1)->orderBy('updated_at', 'desc')->paginate(10);
        return view('client.pc.list', compact('data', 'category'));
    }

    //详情
    public function show($id)
    {
        $tpl = $this->getBaseTemplate();

        if ($tpl === 'pc') {
            $article = $this->getArticleData($id);
            return view('client.pc.article', compact('article'));
        } else {
            return view('client.wap.article');
        }

    }


    /**
     * wap
     */
    public function wapList($pid)
    {
        $tpl = $this->getBaseTemplate();
        if ($tpl === 'pc') {
            return redirect('/');
        } else {
            return $pid;
        }
    }
}
