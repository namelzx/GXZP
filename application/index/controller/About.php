<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/10/18
 * Time: 下午9:51
 */

namespace app\index\controller;


class About extends Base
{
    public function index()
    {
        $data = input('param.');
        if(!empty($data['id'])){
            $res = db('article')->where('mid', $data['id'])->find();
        }else{
            $res = db('article')->where('mid',20)->find();
            $data['id']=20;
        }
        $tomen = db('menu')->where('pid', 15)->order('sort')->select();
        $assign = [
            'res' => $res,
            'tomen' => $tomen,
            'id' => $data['id']
        ];
        $this->assign($assign);
        return view();
    }

    public function contact(){

         $res = db('article')->where('mid',47)->find();
         dump($res);
    }

}