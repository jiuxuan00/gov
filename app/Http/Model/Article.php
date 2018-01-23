<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    //
    public $fillable = [
        'name', 'subname', 'author','source','conunt','thumb_url','keywords','description','content','sort','pid','cate_name',
        'flags','user_id','department','video','status','created_at'
    ];

    public function _getArticle($id,$num)
    {
//        $data=DB::select("SELECT * FROM `articles` WHERE `pid` LIKE ".$id." LIMIT 0, ".$num."");
        return DB::select("SELECT * FROM `zltgov`.`articles` WHERE `pid` = '".$id."' ORDER BY `created_at` DESC LIMIT 0, ".$num."");
//        return $data;
    }

    //首页 今日扎兰
    public function getIndexTodayZhalan()
    {
        $num=9;
        $data=[
//            'tab1'=>$this->_getArticle(211,$num),  //要闻
//            'tab2'=>$this->_getArticle(212,$num),  //部门
//            'tab3'=>$this->_getArticle(213,$num),  //乡镇
//            'tab4'=>$this->_getArticle(214,$num)  //视频新闻
            'tab1'=>$this->_getArticle(211,$num),  //要闻
            'tab2'=>$this->_getArticle(212,$num),  //部门
            'tab3'=>$this->_getArticle(213,$num),  //乡镇
            'tab4'=>$this->_getArticle(214,$num)  //视频新闻
        ];
        return $data;
    }

    //首页 国务院政策信息
    public function getIndexState()
    {
        $num=7;
        return $this->_getArticle(211,$num);
    }

    //首页  回应关切
    public function getIndexRespond()
    {
        $num=7;
        return $this->_getArticle(245,$num);
    }

    //首页 通知公告
    public function getIndexNotice()
    {
        $num=15;
        $data=$this->_getArticle(215,$num); //要闻
        return $data;
    }

    //首页 政务公开
    public function getIndexGovernment()
    {
        $num=8;
        $data=[
            'tab1'=>$this->_getArticle(163,$num), //政府文件
            'tab2'=>$this->_getArticle(162,$num), //政办文件
            'tab3'=>$this->_getArticle(247,$num), //政务工作报告
            'tab4'=>$this->_getArticle(41,$num), //重点领悟公开
            'tab5'=>$this->_getArticle(248,$num), //统计数据
            'tab6'=>$this->_getArticle(47,$num), //农村产权交易中心
        ];
        return $data;
    }

    //首页 休闲旅游
    public function getIndexTourism()
    {
        $num=5;
        $data=[
            'tab1'=>$this->_getArticle(81,$num), //旅游景点
            'tab2'=>$this->_getArticle(82,$num), //民俗风情
            'tab3'=>$this->_getArticle(83,$num), //旅游线路
            'tab4'=>$this->_getArticle(84,$num), //吃住行娱
            'tab5'=>$this->_getArticle(85,$num), //特产购物
        ];
        return $data;
    }

    //首页 招商投资
    public function getIndexInvestment()
    {
        $num=5;
        $data=[
            'tab1'=>$this->_getArticle(81,$num), //投资环境
            'tab2'=>$this->_getArticle(82,$num), //民俗风情
            'tab3'=>$this->_getArticle(83,$num), //旅游线路
            'tab4'=>$this->_getArticle(84,$num), //吃住行娱
        ];
        $data['tab1']=$this->_getArticle(249,5); //投资环境
        $data['tab2']=$this->_getArticle(250,5); //招商项目
        $data['tab3']=$this->_getArticle(251,5); //投资成本
        $data['tab4']=$this->_getArticle(252,5); //投资程序
        return $data;
    }

    //首页 广告位
    public function getAdverts($pid,$num=20)
    {
        $data=DB::select("SELECT * FROM `adverts` WHERE `pid` LIKE '".$pid."' LIMIT 0, ".$num."");
        return $data;
    }


    //获取推荐类型的文章
    public function getFlagsArticles($typeId,$limit=5)
    {
        $data=DB::select("SELECT * FROM `articles` WHERE `flags` LIKE '%".$typeId."%'  ORDER BY `created_at` DESC LIMIT 0,".$limit."");
        return $data;
    }



}
