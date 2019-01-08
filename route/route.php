<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});
Route::get('hello/:name', 'index/hello');
Route::post('Update', 'admin/index/upload');

//后台管理酒店路由
Route::group('admin/', function () {

    Route::get('User/Login', 'admin/Admin/login');
    Route::post('Update', 'admin/index/upload');

    /** 轮播图路由 */
    Route::Get('Banner/GetBannerByList', 'admin/banner/GetBannerByList');
    Route::Post('Banner/PostBannerByData', 'admin/banner/PostBannerByData');
    Route::Get('Banner/GetIdByDelete', 'admin/banner/GetIdByDelete');
    Route::Post('Banner/PostDataBystatus', 'admin/banner/PostDataBystatus');

    /** 推文 */
    Route::Get('Tweets/GetTweetsByList', 'admin/tweets/GetTweetsByList');
    Route::Post('Tweets/PostTweetsByData', 'admin/tweets/PostTweetsByData');
    Route::Get('Tweets/GetIdByDelete', 'admin/tweets/GetIdByDelete');
    Route::Post('Tweets/PostDataBystatus', 'admin/tweets/PostDataBystatus');
    /** 菜单路由*/
    Route::Get('Menu/GetByList', 'admin/menu/GetByList');
    Route::Post('Menu/PostDataByAdd', 'admin/menu/PostDataByAdd');
    Route::Get('Menu/GetIdByDelete', 'admin/menu/GetIdByDelete');
    Route::Post('Menu/PostDataBystatus', 'admin/menu/PostDataBystatus');
    /** 文章路由 */
    Route::Get('Menu/GetByList', 'admin/menu/GetByList');
    Route::Post('Menu/PostDataByAdd', 'admin/menu/PostDataByAdd');
    Route::Get('Menu/GetIdByDelete', 'admin/menu/GetIdByDelete');
    Route::Post('Menu/PostDataBystatus', 'admin/menu/PostDataBystatus');
    /** 文章路由 */
    Route::Get('Article/GetDataByList', 'admin/article/GetDataByList');
    Route::Post('Article/PostDataByAdd', 'admin/article/PostDataByAdd');
    Route::Get('Article/GetIdByDelete', 'admin/article/GetIdByDelete');
    Route::Get('Article/Tree', 'admin/article/Tree');
    Route::Post('Article/PostDataBystatus', 'admin/article/PostDataBystatus');
    /** 系统配置*/
    Route::Get('Config/GetByFind', 'admin/config/GetByFind');
    Route::Post('Config/PostDataByAdd', 'admin/config/PostDataByAdd');

});
return [

];
