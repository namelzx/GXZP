<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/10/13
 * Time: 下午2:34
 */

namespace app\admin\controller;


use app\admin\model\Menu as MenuModel;

class Menu extends Base
{
    public function PostDataByAdd()
    {

        $data = input('param.');
        $data['status'] = 1;
        $Model = new MenuModel();
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

    public function GetByList()
    {
        $data = input('param.');
        $res = MenuModel::GetByList($data);
        $Trre = MenuModel::all();
        $arry = getTree($Trre);
        $return = [];
        foreach ($arry as $key => $item) {
            $return[$key]['title'] = str_repeat('--', $item['level']) . $arry[$key]['title'];
            $return[$key]['pid'] = $arry[$key]['id'];
        }


        return json(['data' => $res, 'Trre' => $return]);
    }

    public function GetIdByDelete()
    {
        $data = input('param.');
        $Model = new MenuModel();
        $res = $Model->where('id', $data['id'])->delete();
        return json($res);
    }


    public function PostDataBystatus()
    {
        $data = input('param.');
        $Model = new MenuModel();
        $res = $Model->where('id', $data['id'])->data($data)->update();
        return json($res);
    }
    public function PostDataByMuen()
    {
        $data = input('param.');
        $Model = new MenuModel();
        $res = $Model->where('id', $data['id'])->data($data)->update();
        return json($res);
    }


}