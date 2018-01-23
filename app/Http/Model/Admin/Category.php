<?php

namespace App\http\Model\Admin;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = [
        'name',
        'pid',
        'sort'
    ];

    //获取分类列表
    public function getCategories($pid = 0)
    {
        $menus = $this->where('pid', $pid)->get(['id','name','pid']);
        $arr = [];
        if (!empty($menus)) {
            foreach ($menus as $k => $v) {
                if ($v['pid'] == $pid) {
                    $arr[$k] = $v;
                    $arr[$k]['children'] = self::getCategories($v['id']);
                }
            }
            return $arr;
        }
    }


}
