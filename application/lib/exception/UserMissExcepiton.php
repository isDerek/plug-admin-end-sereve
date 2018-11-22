<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/18
 * Time: 上午9:43
 */

namespace app\lib\exception;


class UserMissExcepiton extends BaseException
{
    public $code = 200;
    public $msg = '用户名或密码不正确';
    public $errorCode = 10000;
}