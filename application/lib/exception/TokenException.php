<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/11/5
 * Time: 上午10:28
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $msg = 'Token 已过期或无效 Token';
    public $errorCode = 10001;
}