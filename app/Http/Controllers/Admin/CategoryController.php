<?php

namespace App\Http\Controllers\Admin;

use App\http\Model\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends CommonController
{
    public function index()
    {
        return view('admin.category');
    }

    //获取选中分类信息
    public function getCate($pid, $id)
    {
        $data = DB::table('categories')->where('id', $id)->get();

        if ($data[0]->pid == 0) {
            $data[0]->cate_name = '一级分类';
        } else {
            $data[0]->cate_name = DB::select('SELECT name FROM `categories` WHERE `id` = ' . $pid)[0]->name;
        }

        return $data = [
            "code" => 0,
            "count" => 0,
            "data" => $data
        ];
    }

    //创建分类
    public function create()
    {
        return view('admin.category-create');
    }

    //创建分类  保存
    public function store(Request $request)
    {
        $input = $request->only('name', 'pid','sort');
        $re = Category::create($input);
        if($re){
            return redirect('admin/cate');
        }
    }

    //更新分类
    public function update(Request $request)
    {
        $id = $request['id'];
        $name = $request['name'];
        $pid = $request['pid'];
        $sort = $request['sort'];

        $re = DB::table('categories')->where('id', $id)->update(['name' => $name, 'pid' => $pid, 'sort' => $sort]);

        if ($re) {
            return $data = [
                'status' => 1,
                'message' => '更新成功！'
            ];
        } else {
            return $data = [
                'status' => 0,
                'message' => '更新失败，请重试！'
            ];
        }
    }


    //get
    public function cates()
    {
        return (new Category)->getCategories();
    }

    /**
     * @return 前台预览
     */

    //首页
    public function preview()
    {
        return view('admin.category-preview');
    }

    //返回数据
    public function show(Request $request, $id)
    {
        $page = $request['page'];
        $limit = $request['limit'];
        $articles = DB::select('SELECT * FROM `articles` WHERE `pid` = ' . $id . ' ORDER BY `id` DESC LIMIT ' . ($page - 1) * $limit . ',' . $limit);

        $count = DB::table('articles')->where('pid', $id)->count();


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

        return $data = [
            "code" => 0,
            "count" => $count,
            "data" => $articles
        ];
    }

}
