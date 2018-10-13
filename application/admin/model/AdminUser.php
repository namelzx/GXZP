<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/10/12
 * Time: 下午11:00
 */

namespace app\admin\model;


class AdminUser extends BaseModel
{
    /**
     * @param $data 提交的数据
     */
    public static function PostByAdd($data)
    {
        $res = self::create($data);
        return $res;
    }

}