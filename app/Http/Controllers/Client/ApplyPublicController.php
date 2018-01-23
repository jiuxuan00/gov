<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplyPublicController extends BaseController
{
    //
    public function index()
    {
        $data = DB::table('apply-public')->where('is_display', 1)->orderBy('id', 'desc')->get();
        return view('client.pc.ysqgk.list', compact('data'));
    }

    //详情
    public function detail($id)
    {
        $article = DB::select('SELECT * FROM `apply-public` WHERE `id` = ' . $id)[0];
        //更新浏览量
        DB::select('UPDATE `apply-public` SET `count`= ' . ($article->count + 1) . ' WHERE (`id`=' . $id . ') LIMIT 1');
        return view('client.pc.ysqgk.article', compact('article'));
    }


    //申请信息流程图
    public function process()
    {
        return view('client.pc.ysqgk.process');
    }

    //在线申请
    public function apply()
    {
        return view('client.pc.ysqgk.apply');
    }

    //在线申请 接收数据
    public function store(Request $request)
    {
        $re = DB::table('apply-public')->insert([
            'address' => $request['address'],
            'content' => $request['content'],
            'email' => $request['email'],
            'name' => $request['name'],
            'password' => $request['password'],
            'phone' => $request['phone'],
            'is_display' => 0
        ]);


        if ($re) {
            return $data = [
                'status' => 1,
                'message' => '提交成功！'
            ];
        } else {
            return $data = [
                'status' => 0,
                'message' => '提交失败，请重试！'
            ];
        }
    }

    //搜索
    public function query(Request $request)
    {
        return view('client.pc.ysqgk.query');
    }

    public function search(Request $request)
    {
        $data = DB::table('apply-public')->where('phone', $request->phone)->get();

        if (count($data) > 0) {
            if ($request['password'] == $data[0]->password) {
                return [
                    'status' => 1,
                    'data' => $data[0]
                ];
            }else {
                return [
                    'status' => 0,
                    'data' => '密码错误！'
                ];
            }
        } else {
            return [
                'status' => 0,
                'data' => '没有此记录！'
            ];
        }

    }
}
