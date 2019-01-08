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
        if (empty($data['type'])){

        }
            $wheredata=[];
            if(!empty($data['type'])){
                $wheredata['id']=$data['type'];
            }
            $res = self::where($wheredata);
            $res = $res->where('pid', 'neq', 0)->order('sort')->paginate($data['limit'], false, ['query' => $data['page']]);
            return $res;
//        }
    }
}