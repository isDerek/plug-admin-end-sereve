<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/17
 * Time: 下午2:01
 */

namespace app\api\validate;


class UserLogin extends BaseValidate
{
    protected $rule = [
        'username' => 'require|isUserName',
        'password' => 'require|isPassword',
        'msgId' => 'require'
    ];
    protected function isUserName($value){
        $rule = '^[a-zA-Z0-9_-]{4,16}$^';//用户名正则，4到16位（字母，数字，下划线，减号）
        $result = preg_match($rule,$value);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    protected function isPassword($value){
        $rule = '^[a-zA-Z0-9]{4,10}$^';//密码不能含有非法字符，长度在4-10之间
        $result = preg_match($rule,$value);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}