<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/10/20
 * Time: 上午1:45
 */

namespace app\index\controller;


class News extends Base
{
    public function index()
    {
        $data = input('param.');
        $tomen = db('menu')->where('pid', 23)->select();
        $res = db('menu')->where('id', 23)->find();
        if (!empty($data['id'])) {
            $news = db('article')->where('mid', $data['id'])->paginate(5);
        } else {
            $data['id'] = 24;
            $news = db('article')->where('mid', $tomen[0]['id'])->paginate(5);
        }
        $params = request()->param();//这个是获取地址栏参数。。主要作用是分页的时候带参数
        dump($res['images_url']);
        $assign = [
            'tomen' => $tomen,
            'id' => $data['id'],
            'params' => $params,
            'news' => $news
        ];
        $this->assign($assign);
        return view();
    }

    public function newsinfo()
    {
        $data = input('param.');
        $tomen = db('menu')->where('pid', 23)->select();
        $res = db('article')->where('id', $data['nid'])->find();
        $assign = [
            'id' => $data['id'],
            'tomen' => $tomen,
            'controller' => 'news',
            'res' => $res
        ];
        $this->assign($assign);
        return view();
    }

}