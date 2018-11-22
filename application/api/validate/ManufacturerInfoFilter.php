<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/31
 * Time: 上午9:00
 */

namespace app\api\validate;


class ManufacturerInfoFilter extends BaseValidate
{
    protected $rule = [
        'msgId' => 'require',
        'manufacturerID' => 'number',
    ];
}