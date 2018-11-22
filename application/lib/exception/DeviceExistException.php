<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/31
 * Time: 下午5:43
 */

namespace app\lib\exception;


class DeviceExistException extends BaseException
{
    public $code = 200;
    public $msg = '该设备编号已存在';
    public $errorCode = 10000;
}