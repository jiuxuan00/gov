<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends CommonController
{

    //
    public function show()
    {
        return view('admin.message');
    }


    //详情
    public function edit($id)
    {
        $message = DB::table('messages')->where('id', $id)->first();
        return view('admin.message-article', compact('message'));
    }


    //回复 put
    public function update(Request $request, $id)
    {

        $type = $request['type'];
        $is_display=$request['is_display'];
        $department=$request['department'];
        $re_content=$request['re_content'];
        $re_time=date('Y-m-d H:d:s', time());

        $re=DB::table('messages')->where('id',$id)->update([
            'is_display'=>$is_display,
            'department'=>$department,
            're_content'=>$re_content,
            're_time'=>$re_time,
        ]);

        if($re){
            return $data=[
                'status'=>1,
                'type'=>$type,
                'message'=>'信息提交成功！'
            ];
        }else {
            return $data=[
                'status'=>0,
                'type'=>$type,
                'message'=>'信息提交失败，请重试！'
            ];
        }
    }

    //选择回复人
    public function selected(Request $request)
    {
        $id=$request['id'];
        $user_id=$request['user_id'];
        $department=$request['department'];
        $re=DB::table('messages')->where('id',$id)->update([
            'user_id'=>$user_id,
            'department'=>$department,
        ]);
        if($re){
            return $data=[
                'status'=>1,
                'message'=>'信息提交成功！'
            ];
        }else {
            return $data=[
                'status'=>0,
                'message'=>'信息提交失败，请重试！'
            ];
        }
    }

    //获取信件信息
    public function getMessages($id)
    {
        $role = $this->user->role;
        $userId = $this->user->id;

        if ($role == 0) {//超级管理员查找全部数据
            $data = [
                'data' => DB::table('messages')->where('type', $id)->get(),
                'count' => DB::table('messages')->where('type', $id)->count(),
                'code' => 0
            ];
        } else {//子管理员查找自己名下的数据
            $data = [
                'data' => DB::table('messages')->where('user_id', $userId)->get(),
                'count' => DB::table('messages')->where('user_id', $userId)->count(),
                'code' => 0
            ];
        }
        return $data;
    }

    //获取所有用户
    public function users()
    {
        return DB::table('users')->get(['id', 'name','type']);
    }

}
