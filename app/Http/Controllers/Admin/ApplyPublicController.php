<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplyPublicController extends CommonController
{
    //
    public function index()
    {
        return view('admin.apply');
    }

    //
    public function data(Request $request)
    {
        $type = $request['type'];
        $page = $request['page'];
        $limit = $request['limit'];

        return [
            'code' => 0,
            'count' => DB::select('SELECT count(*) as total FROM `apply-public`')[0]->total,
            'data' => DB::select('SELECT * FROM `apply-public` WHERE `is_display` = ' . $type . ' ORDER BY `id` DESC LIMIT ' . ($page - 1) * $limit . ', ' . $limit)
        ];
    }

    //编辑
    public function edit($id)
    {
        $data = DB::table('apply-public')->where('id', $id)->first();
        return view('admin.apply-edit', compact('data'));
    }

    //更新
    public function update(Request $request, $id)
    {
        $auditor = $request['auditor']; //审核人
        $count = $request['count']; //浏览量
        $public_title = $request['public_title']; //公开标题
        $public_content = $request['public_content']; //公开内容
        $public_time = $request['public_time']; //公开时间
        $publisher = $request['publisher']; //发布机构
        $is_display = $request['is_display']; //是否公开 0是不公开  1是公开  2是删除


        $re = DB::table('apply-public')->where('id', $id)->update([
            'auditor' => $auditor,
            'count' => $count,
            'public_title' => $public_title,
            'public_content' => $public_content,
            'public_time' => $public_time,
            'publisher' => $publisher,
            'is_display' => $is_display,
        ]);

        if ($re) {
            return $data = [
                'status' => 1,
                'message' => '提交成功'
            ];
        } else {
            return $data = [
                'status' => 0,
                'message' => '提交失败，请重试'
            ];
        }

    }

    //删除
    public function destory(Request $request)
    {
        $id = $request['id'];
        $re = DB::table('apply-public')->where('id', $id)->update(['is_display' => 2]);
        if ($re) {
            return $data = [
                'status' => 1,
                'message' => '删除成功！'
            ];
        } else {
            return $data = [
                'status' => 0,
                'message' => '删除失败，请重试'
            ];
        }
    }

}
