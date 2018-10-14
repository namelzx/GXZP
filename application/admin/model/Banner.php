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
        if ($data['sort'] == "状态") {
            $res = self::paginate($data['limit'], false, ['query' => $data['page']]);
            return $res;
        } else {
            $res = self::where('status', $data['sort']);
            if (!empty($data['username'])) {
                $res = $res->where('title', 'like', '%' . $data['username'] . '%');
            }
            $res = $res->paginate($data['limit'], false, ['query' => $data['page']]);
            return $res;
        }
    }

    public static function PostByData($data)
    {
        $res = self::allowField(true)->save($data);
        return $res->id;
    }

}