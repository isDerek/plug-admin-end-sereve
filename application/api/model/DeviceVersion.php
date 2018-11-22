<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/31
 * Time: 下午1:58
 */

namespace app\api\model;


use think\Request;
use traits\model\SoftDelete;

class DeviceVersion extends BaseModel
{
    use SoftDelete;
    protected $autoWriteTimestamp = true;

}