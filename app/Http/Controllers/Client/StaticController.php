<?php

namespace App\Http\Controllers\Client;

use App\http\Model\Client\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class StaticController extends BaseController
{
    public function staticHtml($name)
    {
        //网上调查
        return view('client.pc.static.'.$name);
    }



}
