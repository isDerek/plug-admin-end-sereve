<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/11/2
 * Time: 上午8:51
 */

namespace app\api\validate;


class DeviceRegisterFilter extends BaseValidate
{
    protected $rule = [
        'msgId' => 'require',
        'manufacturerID' => 'number',
        'deviceID' => 'number',
    ];
}