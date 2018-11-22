<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/29
 * Time: 下午1:20
 */

namespace app\api\validate;


class ManufacturerInfoUpdate extends BaseValidate
{
    protected $rule = [
        'notifyAddress' => 'require|isUrl',
        'manufacturerName' => 'require',
        'msgId' => 'require',
        'manufacturerID' => 'require|number'
    ];
    protected function isUrl($value){
        $rule = '^[a-zA-Z0-9][-a-zA-Z0-9]{0,62}(\.[a-zA-Z0-9][-a-zA-Z0-9]{0,62})+\.?^';//域名正则
        $result = preg_match($rule,$value);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}