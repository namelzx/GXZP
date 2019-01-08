<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/10/26
 * Time: 下午1:27
 */

namespace app\admin\controller;

use app\admin\model\Tweets as TweetsData;


class Tweets extends Base
{
    /**
     * 获取轮播图列表
     */
    public function GetTweetsByList()
    {
        $data = input('param.');
        $res = TweetsData::GetByList($data);
        return json($res);

    }

    /**
     *  添加轮播图
     */
    public function PostTweetsByData()
    {
        $data = input('param.');
        $Model = new TweetsData();
        if (empty($data['id'])) {
            $data['create_time'] = time();
            $data['status'] = 2;
            $res = $Model->allowField(true)->insertGetId($data);
            $return['time'] = time();
            $return['id'] = $res;
            return json($return);
        } else {
            $data['create_time'] = time();
            $res = $Model->where('id', $data['id'])->data($data)->update();
            return json($res);
        }
    }

    public function GetIdByDelete()
    {
        $data = input('param.');
        $Model = new TweetsData();
        $res = $Model->where('id', $data['id'])->delete();
        return json($res);
    }

    public function PostDataBystatus()
    {
        $data = input('param.');
        $Model = new TweetsData();
        $res = $Model->where('id', $data['id'])->data($data)->update();
        return json($res);
    }
}