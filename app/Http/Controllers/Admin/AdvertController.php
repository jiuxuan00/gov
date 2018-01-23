<?php

namespace App\Http\Controllers\Admin;

use App\http\Model\Advert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;



class AdvertController extends Controller
{
    //
    public function index()
    {
        $adverts=(new Advert)->sortMenu();
        return view('admin.advert.index',compact('adverts'));
    }


    //post admin/advert/{id}
    public function update($id)
    {
        $input=Input::except('_method');

        if(isset($input)){
            $re=DB::table('adverts')->where('id',$id)->update($input);

            if ($re) {
                $data = [
                    'code' => 1,
                    'msg' => '广告更新成功！'
                ];
            } else {
                $data = [
                    'code' => 0,
                    'msg' => '图片和链接没有修改，请修改后提交！'
                ];
            }

            return $data;

        }

    }


    //get admin/advert/{id}
    public function show($id)
    {
        $data=Advert::where('pid',$id)->get();
        return response()->json($data);
    }

}
