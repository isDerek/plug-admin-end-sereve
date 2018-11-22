<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/26
 * Time: 下午1:45
 */

namespace app\lib\exception;


class ManufacturerExistException extends BaseException
{
    public $code = 200;
    public $msg = '厂商名称或厂商编号已存在';
    public $errorCode = 10000;
}