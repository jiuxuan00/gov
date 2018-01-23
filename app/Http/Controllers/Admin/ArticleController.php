<?php

namespace App\Http\Controllers\Admin;


use App\http\Model\Admin\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ArticleController extends CommonController
{
    //更新报送量表数据
    protected function updateSubmission($id)
    {
        (new Article)->updateSubmission($id);
    }

    //
    public function index()
    {
        $users = $this->getUsers();
        return view('admin.article', compact('users'));
    }

    //展示 get
    public function show(Request $request, $id)
    {
        $page = $request['page'];
        $limit = $request['limit'];
        $articles = $this->getUserArticles($id, $page, $limit);
        return $data = [
            "code" => 0,
            "count" => $articles['count'],
            "data" => $articles['data']
        ];
    }

    //创建
    public function create()
    {
        return view('admin.article-create');
    }

    //编辑 get
    public function edit($id)
    {
        $article = DB::table('articles')->where('id', $id)->first();
        return view('admin.article-edit', compact('article'));
    }

    //保存 post
    public function store()
    {
        $input = Input::except('file', '_token');
        $userId = $this->user->id;
        $userRole = $this->user->role;

        //1.验证用户名
        $rules = [
            'name' => 'required'
        ];
        $message = [
            'name.required' => '分类名称不能为空！'
        ];
        $validator = Validator::make($input, $rules, $message);

        if ($userRole == 0 || $userId == 89 || $userId == 90 || $userId == 91) {
            $input['status'] = 1;
        } else {
            $input['status'] = 0;
        }

        //农村产权交易中心91   督查室90   金融办89
        if ($userId == 89) {
            $input['pid'] = 89;
        } else if ($userId == 90) {
            $input['pid'] = 90;
        } else if ($userId == 91) {
            $input['pid'] = 91;
        }

        $input['created_at'] = $input['updated_at'];

        if ($validator->passes()) {
            $re = DB::table('articles')->insert($input);
            if ($re) {
                $this->updateSubmission($userId);
                return redirect('/admin/article');
            } else {
                return back()->with('errors', '数据填充失败，请稍后重试！');
            }
        } else {
            return back()->withErrors($validator);
        }
    }

    //更新 put
    public function update($id)
    {
        $input = Input::except('_token', '_method');

        if (empty($input['flags'])) {
            $input['flags'] = 0;
        }


        $re = DB::table('articles')->where('id', $id)->update($input);
        if ($re) {
            return redirect('/admin/article');
        } else {
            return back()->with('errors', '数据填充失败11，请稍后重试！');
        }

    }

    //ajax 更新 post
    public function ajaxUpdate(Request $request, $id)
    {
        $pid = $request->pid;
        $cateName = DB::table('categories')->where('id', $pid)->value('name');
        $re = DB::table('articles')->where('id', $id)->update(['pid' => $pid, 'cate_name' => $cateName]);
        if ($re) {
            return $data = [
                'status' => 1,
                'messages' => '分类更新成功！'
            ];
        } else {
            return $data = [
                'status' => 0,
                'messages' => '分类更新失败，请重试！'
            ];
        }
    }

    //ajax 审核 post
    public function ajaxChecked(Request $request, $id)
    {
        $re = DB::table('articles')->where('id', $id)->update(['status' => 1]);
        if ($re) {
            $userId=DB::select('SELECT user_id FROM `articles` WHERE `id` = '.$id)[0];
            $this->updateSubmission($userId->user_id);
            return $data = [
                'status' => 1,
                'messages' => '审核成功！'
            ];
        } else {
            return $data = [
                'status' => 0,
                'messages' => '审核失败，请重试！'
            ];
        }
    }

    //删除 post
    public function destroy($id)
    {
        $re = DB::table('articles')->where('id', $id)->update(['status' => 2]);
        if ($re) {
            $arr = [
                'status' => 1,
                'messages' => '文章删除成功'
            ];
        } else {
            $arr = [
                'status' => 1,
                'messages' => '文章删除成功'
            ];
        }
        return $arr;
    }

    //查看全部未审核文章
    public function verify(Request $request)
    {
        $page = $request['page'];
        $limit = $request['limit'];
        $articles = DB::select('SELECT * FROM `articles` WHERE `status` LIKE 0 ORDER BY `id` DESC LIMIT ' . ($page - 1) * $limit . ',' . $limit);

        $count = DB::table('articles')->where('status', '!=', '')->where('status', 0)->count();


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
