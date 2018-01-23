<?php

namespace App\Http\Controllers\Admin;

use App\http\Model\Links;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LinksController extends Controller
{
    //
    public function index()
    {
        $links=Links::where('status',1)->orderBy('created_at','desc')->paginate(20);
        return view('admin.links.index',compact('links'));
    }

    //get admin/link/create
    public function create()
    {
        return view('admin.links.create');
    }

    //post admin/link/
    public function store()
    {
        $input=Input::except('_token');

        //验证
        $rules = [
            'name' => 'required',
            'uri' => 'required'
        ];
        $message = [
            'name.required' => '名称不能为空！',
            'uri.required' => '链接不能为空！'
        ];
        $validator = Validator::make($input, $rules, $message);
        $input['status']=1;

        if ($validator->passes()) {
            $re = Links::create($input);
            if ($re) {
                return redirect('admin/link');
            } else {
                return back()->with('errors', '数据填充失败，请稍后重试！');
            }
        } else {
            return back()->withErrors($validator);
        }

    }


    //get admin/link/{id}/edit
    public function edit($id)
    {
        $link=Links::find($id);
        return view('admin.links.edit',compact('link'));
    }

    //put.admin/link/{id}    更新友情链接
    public function update($id)
    {
        $input = Input::except('_token','_method');
        //验证
        $rules = [
            'name' => 'required',
            'uri' => 'required'
        ];
        $message = [
            'name.required' => '名称不能为空！',
            'uri.required' => '链接不能为空！'
        ];
        $validator = Validator::make($input, $rules, $message);

        if ($validator->passes()) {
            $re = Links::where('id',$id)->update($input);
            if ($re) {
                return redirect('admin/link');
            } else {
                return back()->with('errors', '数据填充失败，请稍后重试！');
            }
        } else {
            return back()->withErrors($validator);
        }

    }

    //delete.admin/link/{id}   删除
    public function destroy($id)
    {
        $re = Links::where('id',$id)->update(['status'=>0]);
        if($re){
            $data = [
                'status' => 0,
                'msg' => '友情链接删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '友情链接删除失败，请稍后重试！',
            ];
        }
        return $data;
    }



}
