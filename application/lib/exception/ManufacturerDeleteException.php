<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/29
 * Time: 下午5:31
 */

namespace app\lib\exception;


class ManufacturerDeleteException extends BaseException
{
    public $code = 200;
    public $msg = '该厂商 ID 已被删除或厂商 ID 不存在';
    public $errorCode = 10000;
}