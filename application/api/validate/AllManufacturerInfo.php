<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/29
 * Time: 上午9:02
 */

namespace app\api\validate;


class AllManufacturerInfo extends BaseValidate
{
    protected $rule = [
        'msgId' => 'require'
    ];
}