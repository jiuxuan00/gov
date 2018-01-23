<?php

//PC
Route::group(['namespace' => 'Client'],function($router){
    $router->get('/','IndexController@index'); //首页
    $router->get('/article/{id}.html','IndexController@show'); //详情

    $router->get('/government','GovernmentController@index');  //政务公开
    $router->get('/government/list','GovernmentController@lists');

    $router->get('/interactive','InteractiveController@index');//互动平台
    $router->get('/interactive/list','InteractiveController@lists');

    $router->get('/news','NewsController@index'); //新闻资讯
    $router->get('/news/list','NewsController@lists');

    $router->get('/serve','ServeController@index'); //在线服务
    $router->get('/serve/list','ServeController@lists');
});







//已登录状态跳转到后台地址
Route::get('/home',function (){
    return redirect('admin/index');
});




//后台首页
Auth::routes();
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']], function ($router) {
    $router->get('index', 'IndexController@index');     //主页
    $router->resource('cate', 'CategoryController');    //分类
    $router->resource('article', 'ArticleController');  //文章
    $router->post('article/batch', 'ArticleController@batch');  //批量修改文章
    $router->resource('user', 'UserController');        //用户
    $router->resource('link', 'LinksController');       //友情链接
    $router->any('upload', 'IndexController@upload');    //图片上传
    $router->resource('advert', 'AdvertController');    //广告管理


    $router->get('report', 'ReportController@index');    //广告管理
    $router->get('report/list', 'ReportController@dataList'); //列表
    $router->get('report/create', 'ReportController@create'); //创建
    $router->any('report/store', 'ReportController@store'); //保存
    $router->post('report/delete', 'ReportController@delete'); //删除
    $router->get('report/{id}/edit', 'ReportController@edit'); //修改
    $router->put('report/{id}', 'ReportController@update'); //修改提交


    $router->get('logout', 'Auth\LoginController@logout'); //退出登录

});