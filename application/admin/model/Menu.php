<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/10/13
 * Time: 下午2:33
 */

namespace app\admin\model;


class Menu extends BaseModel
{
    public static function PostDataByAdd($data)
    {
        return self::create($data);
    }

    public static function GetByList($data)
    {
        if ($data['sort'] == "状态") {
            $res = self::where('pid', 'neq', 0)->paginate($data['limit'], false, ['query' => $data['page']]);
            return $res;
        } else {
            $res = self::where('status', $data['sort']);
            $res = $res->where('pid', 'neq', 0)->paginate($data['limit'], false, ['query' => $data['page']]);
            return $res;
        }
    }
}