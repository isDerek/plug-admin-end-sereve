<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/31
 * Time: 下午1:53
 */

namespace app\api\validate;


class DeviceInfoRegister extends BaseValidate
{
    protected $rule = [
        'msgId' => 'require',
        'deviceID' => 'require|number',
        'versionID' => 'require|number',
        'manufacturerID' => 'require|number',
        'deviceMAC' => 'require'
    ];
}