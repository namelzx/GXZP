<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/10/20
 * Time: 上午1:46
 */

namespace app\index\model;


use think\Model;

class Article extends Model
{
    public static function GetNewsByList($data)
    {
        $res = self::where('mid', 23)->paginate($data['limit'], false, ['query' => $data['page']]);
        return $res;

    }

}