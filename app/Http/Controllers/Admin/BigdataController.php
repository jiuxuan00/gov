<?php

namespace App\Http\Controllers\Admin;


use App\http\Model\Article;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;



class BigdataController extends Controller
{
    //
    public function index()
    {
        return view('admin.big.index');
    }

    public function index2()
    {
        return view('admin.big.index2');
    }



}
