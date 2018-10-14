<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/10/13
 * Time: 下午4:59
 */

namespace app\admin\controller;

use app\admin\model\Article as ArticleModel;


class Article extends Base
{

    public function GetDataByList()
    {
        $data = input('param.');
        $res = ArticleModel::GetByList($data);
        return json($res);
    }

    /**
     *  添加数据
     */
    public function PostDataByAdd()
    {
        $data = input('param.');
        $Model = new ArticleModel();
        if (empty($data['id'])) {
            $data['create_time'] = time();
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
        $Model = new ArticleModel();
        $res = $Model->where('id', $data['id'])->delete();
        return json($res);
    }

    public function PostDataBystatus()
    {
        $data = input('param.');
        $Model = new ArticleModel();
        $res = $Model->where('id', $data['id'])->data($data)->update();
        return json($res);
    }

    public function GetIdByFind()
    {
        $data=input('param.');
        $Model = new ArticleModel();
        $res=$Model->find($data['id']);
        return json($res);

    }


}