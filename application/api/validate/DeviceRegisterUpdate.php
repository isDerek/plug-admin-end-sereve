<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/11/1
 * Time: 上午10:14
 */

namespace app\api\validate;


class DeviceRegisterUpdate extends BaseValidate
{
    protected $rule = [
        'deviceID' => 'require|number',
        'versionID' => 'require|number',
        'deviceMAC' => 'require',
        'msgId' => 'require',
        'manufacturerID' => 'require|number'
    ];

}