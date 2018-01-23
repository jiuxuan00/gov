<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SubmissionController extends Controller
{
    //
    public function show($id)
    {
        $title='';
        if($id==1){
            $title='部门信息排名';
            $data=DB::select('select (s.use_count + s.use_edit_count) as p ,s.* from submissions s WHERE `status` = 1 ORDER BY p desc');
        }elseif ($id==2){
            $title='乡镇信息排名';
            $data=DB::select('select (s.use_count + s.use_edit_count) as p ,s.* from submissions s WHERE `status` = 2 ORDER BY p desc');
        }

        $articles=[
            'title'=>$title,
            'data'=>$data
        ];

        return view('client.pc.submission.article',compact('articles'));
    }

}
