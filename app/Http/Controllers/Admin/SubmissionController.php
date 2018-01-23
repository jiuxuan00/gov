<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubmissionController extends CommonController
{
    //
    public function index()
    {
        $submissions = DB::table('submissions')->orderBy('id', 'asc')->get();

        //按照采用量排序
        $gov=DB::select('select (s.use_count + s.use_edit_count) as p ,s.* from submissions s WHERE `status` = 1 ORDER BY p desc');
        $xzqy=DB::select('select (s.use_count + s.use_edit_count) as p ,s.* from submissions s WHERE `status` = 2 ORDER BY p desc');
        $admin=DB::select('select (s.use_count + s.use_edit_count) as p ,s.* from submissions s WHERE `status` = 3 ORDER BY p desc');


        return view('admin.submission', compact('gov','xzqy','admin'));
    }


    //更新 put
    public function update(Request $request)
    {
        $id = $request['id'];
        $name = $request['name'];
        $count = $request['count'];
        $re = DB::table('submissions')->where('id', $id)->update([$name => $count]);
        if ($re) {
            return $data = [
                'status' => 1,
                'messages' => '更新成功！'
            ];
        } else {
            return $data = [
                'status' => 0,
                'messages' => '更新失败，请重试！'
            ];
        }

    }


    //批量计算报送量
    public function batchUpdate()
    {
        if($this->user->id){
            $users=DB::table('users')->get(['id']);
            foreach ($users as $k=>$v){
                $postCount = DB::table('articles')->where('user_id', $v->id)->count();
                $useCount  = DB::table('articles')->where('user_id', $v->id)->where('status',1)->count();
                DB::table('submissions')->where('user_id', $v->id)->update(['post_count' => $postCount,'use_count'=>$useCount]);
            }
        }else {
            return '您没有权限';
        }
    }

}
