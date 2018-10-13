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


    Route::Post('User/Login', 'admin/admin/login');
    Route::post('Update', 'admin/index/upload');

    /** 轮播图路由 */
    Route::Get('Banner/GetBannerByList', 'admin/banner/GetBannerByList');
    Route::Post('Banner/PostBannerByData', 'admin/banner/PostBannerByData');
    Route::Post('Banner/GetIdByDelete', 'admin/banner/GetIdByDelete');



});
return [

];
