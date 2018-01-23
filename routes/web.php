<?php


//client
Route::group(['namespace' => 'Client'],function($router){
    $router->get('/','IndexController@index'); //pc wap首页
     $router->get('/article/{id}.html','IndexController@show'); //详情
     $router->get('/list/{id}.html','IndexController@artlist'); //详情
     $router->get('/government','GovernmentController@index');  //政务公开
     $router->get('/government/{pid}','GovernmentController@lists'); //列表
     $router->get('/government/{pid}/{id}.html','GovernmentController@show');//详情
     //依申请公开
     $router->get('/ysqgk','ApplyPublicController@index'); //首页
     $router->get('/ysqgk/detail/{id}.html','ApplyPublicController@detail'); //首页
     $router->get('/ysqgk/apply.html','ApplyPublicController@apply'); //申请
     $router->post('/ysqgk/apply/store','ApplyPublicController@store'); //申请  提交
     $router->get('/ysqgk/query.html','ApplyPublicController@query'); //查询
     $router->post('/ysqgk/query/search','ApplyPublicController@search'); //查询
     $router->get('/ysqgk/process.html','ApplyPublicController@process'); //流程图

     //新闻资讯
     $router->get('/news','NewsController@index');
     $router->get('/news/{pid}','NewsController@lists');
     $router->get('/news/{pid}/{id}.html','NewsController@show');

     //办事服务
     $router->get('/serve','ServeController@index');
     $router->get('/serve/{pid}','ServeController@lists');
     $router->get('/serve/{pid}/{id}.html','ServeController@show');

     //走进扎兰
     $router->get('/zhalan.html','ZhalanController@index');
     $router->get('/zhalan/{pid}/{id}.html','ZhalanController@show');

     //互动交流
     $router->get('/interactive','InteractiveController@index'); //首页
     $router->get('/interactive/list_{id}','InteractiveController@lists');//列表
     $router->get('/interactive/mail_{id}','InteractiveController@mailList');//信件列表
     $router->get('/interactive/{pid}/detail/{id}.html','InteractiveController@show'); //详情
     $router->get('/interactive/list_{id}/write','InteractiveController@write');//写信
     $router->post('/interactive/list_{id}/store','InteractiveController@store');//提交
     $router->get('/interactive/search','InteractiveController@search');//信件搜索
     $router->post('/interactive/search','InteractiveController@search');//搜索结果
     $router->get('/interactive/detail/{id}.html','InteractiveController@mailDetail');//搜索结果
	 $router->get('/interactive/list_{id}/zxbs','InteractiveController@zxbs');//在线办事
     $router->get('/interactive/zxbssearch','InteractiveController@zxbssearch');//信件搜索

     //报送信息
     $router->get('/baosong/list/{id}.html','SubmissionController@show');



     //搜索结果
     $router->get('/search.html','SearchController@index');
     $router->get('/searchHigh.html','SearchController@high');

     //静态资源
     $router->get('/static/{name}.html','StaticController@staticHtml');




    /**
     * @ Wap routers
     */
     $router->get('/plus/{pid}','WapController@plus');  //列表
     $router->get('/plus/{pid}/{id}.html','WapController@detail');  //详情
     $router->get('/wap/news','WapController@news');  //新闻首页
     $router->get('/wap/gov','WapController@government');  //政务公开
     $router->get('/wap/zhalan/article/{name}.html','WapController@zhalan');  //走进扎兰
     $router->get('/wap/serve','WapController@serve');  //办事服务



});




//admin
Route::get('auth/logout', 'Auth\LoginController@logout'); //退出登录
Route::get('/home', function (){
    return redirect('/admin/index');
});

Auth::routes();
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']], function ($router) {
    //主页
    $router->get('index', 'IndexController@index');
    $router->get('main', 'IndexController@main');

    //分类管理
    $router->get('cate', 'CategoryController@index');
    $router->get('cate/create', 'CategoryController@create');
    $router->post('cate/store', 'CategoryController@store');
    $router->get('cate/{pid}/{id}', 'CategoryController@getCate');//获取单个分类
    $router->put('cate/{pid}/{id}/update', 'CategoryController@update');//获取单个分类
    $router->get('cate/preview', 'CategoryController@preview'); //前台展示
    $router->get('cate/art_{id}', 'CategoryController@show'); //分类下的文章

    //文章管理
    $router->get('article', 'ArticleController@index');
    $router->get('article/user/{id}', 'ArticleController@show');    //管理员发布的文章
    $router->get('article/verify', 'ArticleController@verify');    //全部未审核文章
    $router->get('article/create', 'ArticleController@create');     //编辑文章
    $router->post('article', 'ArticleController@store');            //保存文章
    $router->get('article/{id}/edit', 'ArticleController@edit');    //编辑文章
    $router->put('article/{id}', 'ArticleController@update');       //更新文章  默认
    $router->post('article/{id}/update', 'ArticleController@ajaxUpdate');         //更新文章  默认
    $router->post('article/{id}/checked', 'ArticleController@ajaxChecked');         //更新文章  默认
    $router->post('article/{id}', 'ArticleController@destroy');     //删除文章


    //报送文章
    $router->get('submission', 'SubmissionController@index');
    $router->put('submission/{id}', 'SubmissionController@update'); //更新
    $router->any('submission/batch', 'SubmissionController@batchUpdate'); //批量更新报送量


    //信件管理
    $router->get('message/show','MessageController@show');
    $router->get('message/detail/{id}/edit','MessageController@edit');
    $router->put('message/detail/{id}','MessageController@update');
    $router->get('message/users', 'MessageController@users');    //获取所有用户
    $router->post('message/users/selected', 'MessageController@selected');    //获取所有用户
    $router->get('message/type_{id}','MessageController@getMessages'); //获取部门和乡镇的数据

    //已申请公开
    $router->get('apply','ApplyPublicController@index');
    $router->get('apply/{id}/edit','ApplyPublicController@edit'); //编辑
    $router->put('apply/{id}/update','ApplyPublicController@update'); //更新
    $router->delete('apply/destory','ApplyPublicController@destory'); //删除
    $router->get('apply/data','ApplyPublicController@data'); //数据


    //搜索
    $router->get('search','SearchController@index');
    $router->post('search/result','SearchController@result');

    //修改密码
    $router->get('password','PasswordController@index');
    $router->any('password/{id}/update','PasswordController@update');


    $router->get('cates', 'CategoryController@cates');    //分类列表
    $router->post('upload', 'CommonController@upload');  //上传图片


    //统一提供api数据的接口
    $router->get('api/cate/{id}', 'ApiController@cate');


    //私用的路由不对外公开仅供调试使用
    $router->get('custom/cate', 'CustomController@cate');




});
