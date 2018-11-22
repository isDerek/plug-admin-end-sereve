<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/29
 * Time: 上午8:59
 */

namespace app\api\validate;


class Username extends BaseValidate
{
    protected $rule = [
        'username' => 'require|isUserName',
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
}