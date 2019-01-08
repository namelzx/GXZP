<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/10/22
 * Time: 下午4:37
 */

namespace app\index\controller;


class Recruit extends Base
{
    public function index()
    {
        $data = input('param.');
        if(!empty($data['id'])){
            $res = db('article')->where('mid', $data['id'])->find();
        }else{
            $res = db('article')->where('mid',32)->find();
            $data['id']=31;
        }
        $tomen = db('menu')->where('pid', 32)->order('id desc')->select();

        $assign = [
            'res' => $res,
            'tomen' => $tomen,
            'id' => $data['id']
        ];
        $this->assign($assign);
        return view();
    }


}