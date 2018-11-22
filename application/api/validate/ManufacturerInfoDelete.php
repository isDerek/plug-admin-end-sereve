<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/29
 * Time: 下午5:17
 */

namespace app\api\validate;


class ManufacturerInfoDelete extends BaseValidate
{
    protected $rule = [
        'msgId' => 'require',
        'manufacturerID' => 'require|number'
    ];
}