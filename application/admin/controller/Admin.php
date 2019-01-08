<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/10/12
 * Time: 下午11:04
 */

namespace app\admin\controller;


use app\admin\model\AdminUser;



header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, authKey, sessionId, Access-Token, X-Token");
class Admin extends Base
{
    /**
     * @return \think\response\Json
     */
    public function PostUserByAdd(){
        $data=input('param.');
        return json($data);
    }

    public function login()
    {
        $data = input('post.');

        if ($this->request->isPost()){
            $userModel = new AdminUser();
            $hasUser = $userModel->where('username', $data['username'])->find();
            dump($hasUser);
            if (empty($hasUser)) {
                return json(logomsg(0, '', '', '管理员不存在'));
            }
            if ($data['password']!= $hasUser['password']) {
                return json(logomsg(0, '', '', $data['password']));
            }
            if (1 != $hasUser['status']) {
                return json(logomsg(0, '', '', '该账号被禁用'));
            }
            return json(logomsg(1, 'admin', url('index/index'), '登录成功'));
        } else {
            return json(logomsg(0, '', '', '登录失败'));
        }
    }

}