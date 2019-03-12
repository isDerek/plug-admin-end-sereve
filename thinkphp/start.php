<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2019/3/12
 * Time: 8:55 AM
 */
namespace think;

//ThinkPHP 引导文件
//加载基础文件

require __DIR__ . '/base.php';
// 执行应用
App::run()->send();