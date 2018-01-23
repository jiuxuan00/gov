<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends BaseController
{
    //
    public function index(Request $request)
    {
        $tpl = $this->getBaseTemplate();
        $keyword = $request['keyword'];
        if (!empty($keyword)) {
            $articles = DB::table('articles')->where('name', 'like', '%' . $keyword . '%')->where('status', 1)->paginate(15);
        } else {
            $articles = '没有数据';
        }
        if ($tpl === 'pc') {
            return view('client.pc.search', compact('articles', 'keyword'));
        }else {
            return view('client.wap.search', compact('articles', 'keyword'));
        }
    }


    //get 高级搜索
    public function high()
    {
        $tpl = $this->getBaseTemplate();
        if ($tpl === 'pc') {
            return view('client.pc.search2');
        }else {
            return view('client.wap.search');
        }
    }

}
