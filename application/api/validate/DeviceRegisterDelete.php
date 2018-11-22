<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/11/2
 * Time: 上午9:18
 */

namespace app\api\validate;


class DeviceRegisterDelete extends BaseValidate
{
    protected $rule = [
        'msgId' => 'require',
        'deviceID' => 'require|number'
    ];
}