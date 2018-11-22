<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/11/5
 * Time: 上午11:38
 */

namespace app\api\controller\v1;


use app\api\service\UserToken;
use app\api\validate\TokenGet;

class Token
{
    public function getToken($user=''){
        (new TokenGet())->gocheck();
        $ut = new UserToken();
        $token = $ut->get($user);
        return [
            'token' => $token
        ];
    }
}