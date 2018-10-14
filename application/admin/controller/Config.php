<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/10/14
 * Time: 上午1:04
 */

namespace app\admin\controller;


use app\admin\model\System;

class Config extends Base
{
    public function GetByFind()
    {
        $res = System::get(1);
        return json($res);

    }

    public function PostDataByAdd()
    {
        $data = input('param.');
        $data['create_time'] = time();
        $res = System::where('id', $data['id'])->data($data)->update();
        return json($res);

    }

}