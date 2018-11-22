<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/11/2
 * Time: 上午9:24
 */

namespace app\lib\exception;


class DeviceRegisterDeleteException extends BaseException
{
    public $code = 200;
    public $msg = '该设备 ID 已被删除或设备 ID 不存在';
    public $errorCode = 10000;
}