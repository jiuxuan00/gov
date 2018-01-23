<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PasswordController extends CommonController
{
    public function index()
    {
        $userId = $this->user->id;
        return view('admin.password');
    }

    //更新密码
    public function update(Request $request, $id)
    {
        $re = $request->user()->fill([
            'password' => Hash::make($request['password'])
        ])->save();

        if($re){
            return $data=[
                'status'=>1,
                'message'=>'密码更新成功，退出后请用新密码登录！'
            ];
        }else {
            return $data=[
                'status'=>0,
                'message'=>'密码更新失败！'
            ];
        }

    }
}
