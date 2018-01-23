<?php

namespace App\http\Model\Client;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    //
    public $fillable = [
        'name', 'link', 'image_uri','pid'
    ];



    //递归层级
    public function sortMenu($pid = 0)
    {
        /**
         * @status =0 删除
         * @status =1 显示
         */
        $menus = $this->get();

        $arr = [];
        if (empty($menus)) {
            return '';
        }

        foreach ($menus as $k => $v) {
            if ($v['pid'] == $pid) {
                $arr[$k] = $v;
                $arr[$k]['child'] = self::sortMenu($v['id']);
            }
        }

        return $arr;
    }
}
