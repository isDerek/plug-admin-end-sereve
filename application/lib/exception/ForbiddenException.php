<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/11/5
 * Time: 上午10:28
 */

namespace app\lib\exception;


class ForbiddenException extends BaseException
{
    public $code = 403;
    public $msg = '权限不够';
    public $errorCode = 10001;
}