<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/26
 * Time: 下午1:27
 */

namespace app\api\controller\v1;


use app\api\validate\AllManufacturerInfo;
use app\api\validate\ManufacturerInfoDelete;
use app\api\validate\ManufacturerInfoFilter;
use app\api\validate\ManufacturerInfoUpdate;
use app\api\validate\ManufacturerInfoRegister;
use app\api\model\ManufacturerInfo as ManufacturerInfoModel;

class Manufacturer
{
    // 注册厂商信息
    public function postManufacturerInfo(){
        (new ManufacturerInfoRegister())->goCheck();
        $manufacturerInfo = (new ManufacturerInfoModel())->postManufacturerInfo();
        return $manufacturerInfo;
    }
    // 获取所有厂商信息
    public function getAllManufacturerInfo(){
        (new AllManufacturerInfo())->goCheck();
        $allManufacturerInfo = (new ManufacturerInfoModel())->getAllManufacturerInfo();
        return $allManufacturerInfo;
    }
    // 编辑厂商信息
    public function putManufacturerInfo(){
        (new ManufacturerInfoUpdate())->goCheck();
        $manufacturerInfo = (new ManufacturerInfoModel())->putManufacturerInfo();
        return $manufacturerInfo;
    }
    // 删除厂商信息
    public function deleteManufacturerInfo(){
        (new ManufacturerInfoDelete())->gocheck();
        $manufacturerInfo = (new ManufacturerInfoModel())->deleteManufacturerInfo();
        return $manufacturerInfo;
    }
    // 获取特定条件的厂商信息
    public function getFilterManufacturerInfo(){
        (new ManufacturerInfoFilter())->gocheck();
        $manufacturerInfo = (new ManufacturerInfoModel())->filterManufacturerInfo();
        return $manufacturerInfo;
    }
}