<?php

namespace App\Http\Controllers\Admin;

use App\http\Model\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{

    //列表
    public function dataList()
    {
        $data=DB::table('reports')->where('status',1)->get();
        return response()->json($data);
    }

    //
    public function index()
    {
        return view('admin.report.index');
    }

    //创建
    public function create()
    {
        return view('admin.report.create');
    }

    //保存
    public function store()
    {
        $input=Input::except('_token');
        $input['sort']=0;
        $input['status']=1;

        //验证
        $rules = [
            'department' => 'required'
        ];
        $message = [
            'department.required' => '名称不能为空！'
        ];
        $validator = Validator::make($input, $rules, $message);


        if ($validator->passes()) {
            $re=Report::create($input);
            if ($re) {
                return redirect('admin/report');
            } else {
                return back()->with('errors', '数据填充失败，请稍后重试！');
            }
        } else {
            return back()->withErrors($validator);
        }


    }

    //修改
    public function edit($id)
    {
        $data=DB::table('reports')->find($id);
        return view('admin.report.edit',compact('data'));
    }

    //删除
    public function delete(Request $request)
    {
        $req=$request->except('_token');
        $re=DB::table('reports')->where('id',$req['id'])->update(['status'=>0]);
        if ($re) {
            $data = [
                'msg' => '报送排名删除成功！'
            ];
        } else {
            $data = [
                'msg' => '报送排名删除失败，请稍后重试'
            ];
        }

        return $data;
    }




    //提交
    public function update($id)
    {
        $input=Input::except('_token','_method');
        $re = DB::table('reports')->where('id',$id)->update($input);
        if($re){
            return redirect('admin/report');
        }else{
            return back()->with('errors','报送排名更新失败，请稍后重试！');
        }

    }




}
