<?php

namespace App\Http\Controllers\Client;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    /*
        |-------------------------------------------------------------------------------
        |
        |  获取基础模板目录
        |
        |-------------------------------------------------------------------------------
    */
    public function getBaseTemplate(){

        if($this->isMobile()){
            return 'wap';
        }else {
            return 'pc';
        }

    }

    public function isMobile(){
        // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
        if (isset ($_SERVER['HTTP_X_WAP_PROFILE'])){
            return TRUE;
        }
        // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
        if (isset ($_SERVER['HTTP_VIA'])){
            return stristr($_SERVER['HTTP_VIA'], "wap") ? TRUE : FALSE;// 找不到为flase,否则为TRUE
        }
        // 判断手机发送的客户端标志,兼容性有待提高
        if (isset ($_SERVER['HTTP_USER_AGENT'])) {
            $clientkeywords = array (
                'mobile',
                'nokia',
                'sony',
                'ericsson',
                'mot',
                'samsung',
                'htc',
                'sgh',
                'lg',
                'sharp',
                'sie-',
                'philips',
                'panasonic',
                'alcatel',
                'lenovo',
                'iphone',
                'ipod',
                'blackberry',
                'meizu',
                'android',
                'netfront',
                'symbian',
                'ucweb',
                'windowsce',
                'palm',
                'operamini',
                'operamobi',
                'openwave',
                'nexusone',
                'cldc',
                'midp',
                'wap'
            );
            // 从HTTP_USER_AGENT中查找手机浏览器的关键字
            if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))){
                return TRUE;
            }
        }
        if (isset ($_SERVER['HTTP_ACCEPT'])){ // 协议法，因为有可能不准确，放到最后判断
            // 如果只支持wml并且不支持html那一定是移动设备
            // 如果支持wml和html但是wml在html之前则是移动设备
            if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== FALSE) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === FALSE || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))){
                return TRUE;
            }
        }
        return FALSE;
    }


    /***
     * @return array 获取二级分类
     */
    public function getCateChildren ($pid,$num=20)
    {
        $data=DB::select("SELECT * FROM `zltgov`.`categories` WHERE `pid` = '".$pid."' LIMIT 0, ".$num."");
        return $data;
    }


    /***
     * @return array 获取分类下的文章
     */
    public function getArticles ($pid,$num=15)
    {
        $data=DB::select("SELECT * FROM `zltgov`.`articles` WHERE `pid` = '".$pid."' LIMIT 0, ".$num."");
        return $data;
    }


    //公共详情部分
    public function getArticleData($id)
    {
        $article=DB::select('SELECT * FROM `articles` WHERE `id` = '.$id)[0];
        DB::table('articles')->where('id',$id)->update(['count'=>$article->count+1]);
        return $article;
    }


}
