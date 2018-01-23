<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class CommonController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = $request->user();
            return $next($request);
        });
    }


    //获取管理员信息
    public function getUsers()
    {
        return DB::table('users')->get();
    }

    //每个管理员发布的文章
    public function getUserArticles($id, $page, $limit)
    {

        $articles = DB::select('SELECT * FROM `articles` WHERE `user_id` LIKE ' . $id . ' AND `status` != 2 ORDER BY `id` DESC LIMIT ' . ($page-1) * $limit . ', ' . $limit);
        $count = DB::table('articles')->where('user_id', $id)->count();
        //处理数据
        foreach ($articles as $article) {
            if ($article->status == 0) {
                $article->status = '未审核';
            } elseif ($article->status == 1) {
                $article->status = '已审核';
            } elseif ($article->status == 2) {
                $article->status = '已删除';
            }
        }
        $data = [
            'count' => $count,
            'data' => $articles
        ];
        return $data;
    }


    //上传图片
    public function upload()
    {
        $imgPath = "/public/uploads/" . date('Ymd') . "/"; //上传文件路径
        $file = Input::file('mypic');
        if ($file->isValid()) {
            //上传文件类型列表
            $types = array('jpg', 'jpeg', 'png', 'gif', 'bmp');
            //图片的类型
            //(1)  $file->getMimeType();  //echo "image/jpeg"
            //(2)  $file->getClientOriginalExtension();   //echo "jpg"
            $file_mime = $file->getClientOriginalExtension();

            //判断上传文件类型
            if (!in_array($file_mime, $types)) {
                echo "图片格式不对!";
                exit;
            }

            //图片的原始名
            $file_name = $file->getClientOriginalName();

            //新文件名    echo "20170303033028.jpg"
            $newName = date('His') . '.' . $file_mime;

            //把文件移动到当前日期的目录 echo "D:\xampp\htdocs\php\Laravel\zltdev./public/uploads/20170303/"
            $file->move(base_path() . $imgPath, $newName);

            //图片在服务器上的路径  echo "20170303/20170303030002.jpg"

            $imageUrl = date('Ymd') . "/" . $newName;

            $arr = array(
                'oldName' => $file_name,
                'newName' => $newName,
                'image_url' => $imageUrl
            );


            //输出json数据
            return response()->json($arr);

        }
    }


}
