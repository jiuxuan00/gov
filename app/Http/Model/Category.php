<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = [
        'name', 'pid', 'sort'
    ];


    //递归层级
    public function sortMenu($pid = 0)
    {
        /**
         * @status =0 删除
         * @status =1 显示
         */
        $menus = $this->where('status', '1')->orderBy('sort', 'desc')->get();

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
