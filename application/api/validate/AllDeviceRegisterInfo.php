<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/11/1
 * Time: 上午9:25
 */

namespace app\api\validate;


class AllDeviceRegisterInfo extends BaseValidate
{
    protected $rule = [
        'msgId' => 'require'
    ];
}