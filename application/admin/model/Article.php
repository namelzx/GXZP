<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/10/13
 * Time: 下午4:58
 */

namespace app\admin\model;


class Article extends BaseModel
{
    public function Menu(){
        return $this->hasOne('Menu', 'id', 'mid');
    }
    public static function GetByList($data)
    {
//        if ($data['sort'] == "状态") {
//            $res = self::with('Menu')->paginate($data['limit'], false, ['query' => $data['page']]);
//            return $res;
//        } else {
        $wheredata=[];
        if(!empty($data['type'])){
            $wheredata['mid']=$data['type'];
        }
            $res = self::with('Menu')->where($wheredata);
            $res = $res->paginate($data['limit'], false, ['query' => $data['page']]);
            return $res;
    }
}