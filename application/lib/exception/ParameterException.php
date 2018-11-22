<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/17
 * Time: 下午2:00
 */

namespace app\lib\exception;


class ParameterException extends BaseException
{
    public $code = 200;
    public $msg = '参数错误';
    public $errorCode = 10000;
}