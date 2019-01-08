<?php

namespace app\index\controller;

class Index extends Base
{
    public function index()
    {
        $qywh = db('article')->where('mid',21)->find();

        $banner = db('banner')->select();
        $news = db('article')->where('mid',12)->order('create_time')->limit(4)->select();
        $res = db('menu')->where('pid', 1)->order('sort')->select();
        $tweets = db('tweets')->where('status', 1)->order('create_time')->paginate(3);
        $assign = [
            'banner' => $banner,
            'news' => $news,
            'indexmune' => $res,
            'tweets' => $tweets,
            'qywh'=>$qywh
        ];
        $this->assign($assign);
        return view();
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
