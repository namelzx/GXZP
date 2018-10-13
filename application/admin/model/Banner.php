<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/10/13
 * Time: 上午1:43
 */

namespace app\admin\model;


class Banner extends BaseModel
{
    public static function GetByList($data)
    {

        $res = self::paginate($data['limit'], false, ['query' => $data['page']]);
        return $res;
    }

    public static function PostByData($data){
        $res=self::allowField(true)->save($data);
        return $res->id;

    }

}