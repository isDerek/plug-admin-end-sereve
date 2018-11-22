<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/31
 * Time: 下午1:49
 */

namespace app\api\controller\v1;


use app\api\validate\AllDeviceRegisterInfo;
use app\api\validate\AllDeviceStatusInfo;
use app\api\validate\DeviceInfoRegister;
use app\api\model\DeviceInfo as DeviceInfoModel;
use app\api\validate\DeviceRegisterDelete;
use app\api\validate\DeviceRegisterFilter;
use app\api\validate\DeviceRegisterUpdate;

class Device
{
    public function getAllDeviceVersion(){

    }
    // 注册设备信息接口
    public function postDeviceRegisterInfo(){
        (new DeviceInfoRegister())->goCheck();
        $device = (new DeviceInfoModel())->postDeviceInfo();
        return $device;
    }
    // 获取注册设备页面所有设备信息
    public function getAllDeviceRegisterInfo(){
        (new AllDeviceRegisterInfo())->goCheck();
        $device = (new DeviceInfoModel())->getAllDeviceInfo();
        return $device;
    }
    // 编辑注册设备信息
    public function putDeviceRegisterInfo(){
        (new DeviceRegisterUpdate())->goCheck();
        $device = (new DeviceInfoModel())->putDeviceInfo();
        return $device;
    }
    // 过滤设备注册信息，查询特定设备
    public function getFilterDeviceRegisterInfo(){
        (new DeviceRegisterFilter())->goCheck();
        $device = (new DeviceInfoModel())->filterDeviceRegisterInfo();
        return $device;
    }
    // 删除设备注册信息
    public function deleteDeviceRegisterInfo(){
        (new DeviceRegisterDelete())->gocheck();
        $device = (new DeviceInfoModel())->deleteDeviceRegisterInfo();
        return $device;
    }
    // 获取设备状态页面所有设备信息
    public function getAllDeviceStatusInfo(){
        (new AllDeviceStatusInfo())->goCheck();

    }

}