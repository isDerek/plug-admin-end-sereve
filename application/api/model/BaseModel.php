<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/18
 * Time: 上午8:39
 */
namespace app\api\model;

use think\Model;

class BaseModel extends Model
{
    protected function prefixImgUrl($value, $data){
        $finalUrl = $value;
        if($data['from'] == 1){
            $finalUrl = config('setting.img_prefix').$value;
        }
        return $finalUrl;
    }
}