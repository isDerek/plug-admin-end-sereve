<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------


use think\Route;
Route::get('api/:version/hello','api/:version.user/hello');
Route::get('api/:version/getUserLogin','api/:version.user/getUserLogin');
Route::get('api/:version/putUserLogout','api/:version.user/putUserLogout');
Route::get('api/:version/postUserInfo','api/:version.user/postUserInfo');
Route::get('api/:version/getUsername','api/:version.user/getUsername');
Route::get('api/:version/postManufacturerInfo','api/:version.manufacturer/postManufacturerInfo');
Route::get('api/:version/getAllManufacturerInfo','api/:version.manufacturer/getAllManufacturerInfo');
Route::get('api/:version/deleteManufacturerInfo','api/:version.manufacturer/deleteManufacturerInfo');
Route::get('api/:version/getFilterManufacturerInfo','api/:version.manufacturer/getFilterManufacturerInfo');
Route::get('api/:version/putManufacturerInfo','api/:version.manufacturer/putManufacturerInfo');
Route::get('api/:version/getAllDeviceRegisterInfo','api/:version.device/getAllDeviceRegisterInfo');
Route::get('api/:version/postDeviceRegisterInfo','api/:version.device/postDeviceRegisterInfo');
Route::get('api/:version/putDeviceRegisterInfo','api/:version.device/putDeviceRegisterInfo');
Route::get('api/:version/getFilterDeviceRegisterInfo','api/:version.device/getFilterDeviceRegisterInfo');
Route::get('api/:version/deleteDeviceRegisterInfo','api/:version.device/deleteDeviceRegisterInfo');
Route::get('api/:version/getAllDeviceStatusInfo','api/:version.device/getAllDeviceStatusInfo');