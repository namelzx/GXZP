<?php

namespace app\index\controller;

class Index extends Base
{
    public function index()
    {
        return view();
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }

    public function pc()
    {
        $i = 140;
        $url = "https://rzc.autohome.com.cn/api/CarOwnerCamp/GetBrandList"; //调用接口地址
        $res = $this->Url($url);

        $res_decode = json_decode($res);
        $re = [];
        foreach ($res_decode->result as $key => $item) {
//            time_sleep_until(time() + 3); // 在20秒后执行后面代码
            foreach ($res_decode->result[$key]->value as $k => $i) {
                $re['key'] = $res_decode->result[$key]->key;
                $re['name'] = $res_decode->result[$key]->value[$k]->name;
                $re['logo'] = $res_decode->result[$key]->value[$k]->logo;
                $re['id'] = $res_decode->result[$key]->value[$k]->id;
                try {
                    db('brand')->insertGetId($re);

                } catch (Exception $exception) {

                }
            }
        }

        return json("wancheng");
    }

    public function Url($url)
    {

        $ch = curl_init();
//        $url = "https://rzc.autohome.com.cn/api/CarOwnerCamp/GetSeriesList?brandId=" . $i; //调用接口地址
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }
}
