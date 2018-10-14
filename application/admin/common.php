<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 2018/6/20
 * Time: 下午10:06
 */
//
//// 应用公共文件
//defined('ADMIN_STATUS') || define('ADMIN_STATUS', [0 => '停封', 1 => '正常']); //管理员状态
/**
 * 统一返回信息
 * @param $status
 * @param $data
 * @param $msg
 * @return array
 */
function msg($status, $data = '', $msg = '')
{
    return compact('status', 'data', 'msg');
}
/**
 * 统一返回信息
 * @param $status
 * @param $data
 * @param $msg
 * @return array
 */
function msgkey($key, $data = '', $msg = '')
{
    return compact('status', 'data', 'msg');
}

/**
 *  登陆返回信息
 * @param $status
 * @param $data
 * @param $msg
 * @return array
 */
function logomsg($status, $token, $data, $msg = '')
{
    return compact('status', 'token', 'data', 'msg');
}

/**
 * md5加密
 * @param $str
 * @return string
 */
function newMd5($str)
{
    return md5('masterjoy//.' . $str);
}

/**
 * 获取树结构
 * @param $arr
 * @param $index
 * @return array
 */
//function getTree($arr, $index)
//{
//    $tree = [];
//    foreach ($arr as $k => $v) {
//        if ($v[$index] != 0) {
//            $arr[$v[$index]]['children'][] = &$arr[$k];
//        } else {
//            $tree[] = &$arr[$k];
//        }
//    }
//    return $tree;
//}

function certification($type)
{

    $user_id = session('user_id');
    if ($type = 1) {
        $res = db('user')->where('id', $user_id)
            ->field('status')->find();
        if ($res['status'] == 1) {
            return "<div class='cell-right'>认证完成</div>";
        } else {
            return "<div class='cell-right' style='background:#0894ec'>立即认证</div>";
        }
    }
}


/**
 * 递归实现无限极分类
 * @param $array 分类数据
 * @param $pid 父ID
 * @param $level 分类级别
 * @return $list 分好类的数组 直接遍历即可 $level可以用来遍历缩进
 */

function getTree($array, $pid =0, $level = 0){

    //声明静态数组,避免递归调用时,多次声明导致数组覆盖
    static $list = [];
    foreach ($array as $key => $value){
        //第一次遍历,找到父节点为根节点的节点 也就是pid=0的节点
        if ($value['pid'] == $pid){
            //父节点为根节点的节点,级别为0，也就是第一级
            $value['level'] = $level;
            //把数组放到list中
            $list[] = $value;
            //把这个节点从数组中移除,减少后续递归消耗
            unset($array[$key]);
            //开始递归,查找父ID为该节点ID的节点,级别则为原级别+1
            getTree($array, $value['id'], $level+1);
        }
    }
    return $list;
}


function generateTree($array){
    //第一步 构造数据
    $items = array();
    foreach($array as $value){
        $items[$value['id']] = $value;
    }
    //第二部 遍历数据 生成树状结构
    $tree = array();
    foreach($items as $key => $value){
        if(isset($items[$item['pid']])){
            $items[$item['pid']]['son'][] = &$items[$key];
        }else{
            $tree[] = &$items[$key];
        }
    }
    return $tree;
}