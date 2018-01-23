<?php

namespace App\http\Model\Admin;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //批量赋值白名单
    public $fillable = [
        'name', //标题
        'subname', //副标题
        'author', //作者
        'source', //来源
        'count', //阅读量
        'thumb_url', //缩略图
        'keywords', //关键词
        'description', //描述
        'content',  //内容
        'sort', //排序
        'pid',  //分类ID
        'flags',  //推荐  新建一个表实现
        'user_id', //作者id
        'department', //审核人
        'video', //视频
        'status', //隐藏 0是隐藏  1是显示
    ];


    //更新报送数据
    public function updateSubmission($userId)
    {
        $postCount = DB::table('articles')->where('user_id', $userId)->count();
        $useCount  = DB::table('articles')->where('user_id', $userId)->where('status',1)->count();
        DB::table('submissions')->where('user_id', $userId)->update(['post_count' => $postCount,'use_count'=>$useCount]);
    }

}
