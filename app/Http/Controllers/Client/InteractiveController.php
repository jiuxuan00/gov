<?php
/**
 * @ 互动交流
 */

namespace App\Http\Controllers\Client;


use App\http\Model\Client\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class InteractiveController extends BaseController
{
    //首页
    public function index(Request $request)
    {

        $tpl = $this->getBaseTemplate();
        if ($tpl === 'pc') {
            $zxft = $this->getMessageIndexArticles(600);  //在线访谈
            $xwfbh = $this->getMessageIndexArticles(603);  //新闻发布会
            $sjszyx = DB::select('SELECT * FROM `messages` WHERE `is_display` = 1 AND `pid` = 260 ORDER BY `updated_at` DESC LIMIT 0, 5'); //书记市长邮箱
            $bmxx = DB::select('SELECT * FROM `messages` WHERE `is_display` = 1 AND `pid` = 261 ORDER BY `updated_at` DESC LIMIT 0, 5');  //部门信箱
            $data = [
                'sjszyx' => $sjszyx,
                'bmxx' => $bmxx,
                'zxft' => $zxft,
                'xwfbh' => $xwfbh
            ];
            return view('client.pc.interactive.index', compact('data'));
        } else {
            return view('client.wap.interactive');
        }
    }

    //列表
    public function lists($id)
    {
        $tpl = $this->getBaseTemplate();
        if ($tpl === 'pc') {
            $cateName = DB::table('categories')->where('id', $id)->first();
            $children = $this->getCateHudong();
            $data = DB::table('messages')->where('pid', $id)->paginate(15);
            $categories = DB::table('categories')->where('pid', $id)->get();
            return view('client.pc.interactive.list', compact('cateName', 'children', 'data', 'categories'));
        } else {
            $dataId = $id;
            return view('client.wap.interactive-mail', compact('dataId'));
        }
    }

    //写信
    public function write(Request $request, $id)
    {
        $cateName = DB::table('categories')->where('id', $id)->first();
        $children = $this->getCateHudong();
        return view('client.pc.interactive.write', compact('cateName', 'children'));
    }

    //在线办事
    public function zxbs(Request $request, $id)
    {
        $cateName = DB::table('categories')->where('id', $id)->first();
        $children = $this->getCateHudong();
        return view('client.pc.interactive.zxbs', compact('cateName', 'children'));
    }

    //写信 提交  post
    public function store(Request $request, $id)
    {
        $input = $request->all();


        //判断姓名
        if (empty($input['name']) || empty($input['email']) || empty($input['phone']) || empty($input['address']) || empty($input['title']) || empty($input['content'])) {
            return $data = [
                'message' => '信息提交错误，请检查后提交！'
            ];
        }

        //时间戳为编号
        $input['serial'] = date("YmdHis", time());


        //判断是那个分类
        if ($id == 260) {//市长书记信箱
            $input['type'] = 1;
        } elseif ($id == 261) {//部门信箱
            $input['type'] = 2;
        }

        $re = Message::create($input);
        if ($re) {
            return $data = [
                'status' => 1,
                'message' => '提交成功！'
            ];
        } else {
            return $data = [
                'status' => 0,
                'message' => '提交失败！'
            ];
        }
    }


    //信件搜索
    public function search(Request $request)
    {


        $tpl = $this->getBaseTemplate();
        $tplName = '';
        if ($tpl === 'pc') {
            $tplName='client.pc.interactive.search';
        } else {
            $tplName='client.wap.interactive-search';
        }

        $children = $this->getCateHudong();
        $message = null;
        if ($request->isMethod('post')) {


            $phone = $request['phone'];
            $pwd = $request['pwd'];
            $data = DB::table('messages')->where('phone', $phone)->get();


            //先判断是否有记录
            if (count($data) > 0) {//有数据
                //
                if ($pwd == $data[0]->password) {
                    $message = $data;
                } else {
                    $message = '查询密码错误！';
                }
                return view($tplName, compact('children', 'message'));
            } else {//没有数据
                $message = '没有数据';
            }
            return view($tplName, compact('children', 'message'));
        }


        return view($tplName, compact('children'));
    }

    //办理查询
    public function zxbssearch(Request $request)
    {
        $children = $this->getCateHudong();
        $message = null;
        if ($request->isMethod('post')) {
            $phone = $request['phone'];
            $pwd = $request['pwd'];
            $data = DB::table('messages')->where('phone', $phone)->get();


            //先判断是否有记录
            if (count($data) > 0) {//有数据
                //
                if ($pwd == $data[0]->password) {
                    $message = $data;
                } else {
                    $message = '查询密码错误！';
                }
                return view('client.pc.interactive.zxbssearch', compact('children', 'message'));
            } else {//没有数据
                $message = '没有数据';
            }
            return view('client.pc.interactive.zxbssearch', compact('children', 'message'));
        }


        return view('client.pc.interactive.zxbssearch', compact('children'));
    }

    //信件详情
    public function mailDetail($id)
    {
        $tpl = $this->getBaseTemplate();
        $message = DB::table('messages')->where('serial', $id)->first();
        $cateInfo = DB::table('categories')->where('id', $message->pid)->first();
        $message->cateName = $cateInfo->name;
        if ($tpl === 'pc') {
            return view('client.pc.interactive.mail-article', compact('message'));
        } else {
            return view('client.wap.interactive-mail-article', compact('message'));
        }


    }

    //信件列表
    public function mailList($id)
    {
        $tpl = $this->getBaseTemplate();
        $cateName = DB::table('categories')->where('id', $id)->first();
        if ($id == 260) {
            $crumbsName = '市长信箱列表';
        } elseif ($id == 261) {
            $crumbsName = '部门信箱列表';
        }
        $children = $this->getCateHudong();
        $messages = DB::table('messages')->where('pid', $id)->where('is_display', 1)->orderBy('updated_at', 'desc')->paginate(15);
        if ($tpl === 'pc') {
            return view('client.pc.interactive.mail-list', compact('cateName', 'children', 'messages', 'crumbsName'));
        } else {
            return view('client.wap.interactive-mail-list', compact('cateName', 'children', 'messages', 'crumbsName'));
        }


    }



    /**
     * @param $pid
     * @return mixed 下方为获取信息方法
     */


    //获取信息部分
    protected function getMessageIndexArticles($pid)
    {
        return DB::select('SELECT id,name,pid FROM `articles` WHERE `pid` LIKE ' . $pid . ' LIMIT 0,5');
    }

    //获取互动交流信息
    protected function getMessages($table, $id, $page = 0, $limit = 20)
    {
        return DB::table($table)->where('pid', $id)->skip($page)->take($limit)->get();
    }

    //交流互动下的分类
    protected function getCateHudong()
    {
        return DB::table('categories')->where('pid', 94)->get();
    }

}
