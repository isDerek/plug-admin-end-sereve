<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/11/2
 * Time: 上午11:00
 */

namespace app\api\validate;


class AllDeviceStatusInfo extends BaseValidate
{
    protected $rule = [
        'msgId' => 'require'
    ];
}