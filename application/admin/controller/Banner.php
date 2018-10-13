<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/10/13
 * Time: 上午1:42
 */

namespace app\admin\controller;

use app\admin\model\Banner as BannerData;

class Banner extends Base
{
    /**
     * 获取轮播图列表
     */
    public function GetBannerByList()
    {
        $data = input('param.');
        $res = BannerData::GetByList($data);
        return json($res);

    }

    /**
     *  添加轮播图
     */
    public function PostBannerByData()
    {
        $data = input('param.');
        $Model=new BannerData();
        $data['create_time']=time();
        $res = $Model->allowField(true)->insertGetId($data);
        return json($res);
    }
    public function  GetIdByDelete(){
        $data=input('param.');
        $Model=new BannerData();
        $res=$Model->delete($data['id']);
        $return['time']=time();
        $return['id']=$res;
        return json($res);
    }

}