<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/31
 * Time: 下午2:08
 */

namespace app\api\model;


use app\lib\exception\DeviceExistException;
use app\lib\exception\DeviceRegisterDeleteException;
use app\lib\exception\ManufacturerExistException;
use think\Request;
use traits\model\SoftDelete;

class DeviceInfo extends BaseModel
{
    protected $autoWriteTimestamp = true;
    use SoftDelete;
    public function manufacturerInfo(){
        return $this->hasOne('manufacturerInfo','order_id','manufacturer_id');
    }
    // 注册设备信息
    public function postDeviceInfo(){
        $request = Request::instance();
        $params = $request->only(['msgId','deviceID','manufacturerID','deviceMAC','versionID']);
        $msgId = $params['msgId'];
        $deviceID = $params['deviceID'];
        $manufacturerID = $params['manufacturerID'];
        $deviceMAC = $params['deviceMAC'];
        $versionID = $params['versionID'];
        $deviceInfoByDID = (new self)->where('device_id','=',$deviceID)
            ->find();
        // 如果设备 ID 未被注册，则允许注册设备
        if(!$deviceInfoByDID){
            $orderID = DeviceInfo::hasWhere('manufacturerInfo',['order_id'=>$manufacturerID])
                ->find();
            if($orderID) {
                $deviceInfo = (new self)->data([
                    'device_id' => $deviceID,
                    'device_mac' => $deviceMAC,
                    'version_id' => $versionID,
                    'manufacturer_id' => $manufacturerID,
                    'msgId' => $msgId
                ]);
                $deviceInfo->save();
                return $deviceInfo;
            }else{
                throw new ManufacturerExistException(['msg'=>'厂商 ID 不存在']);
            }
        }
        throw new DeviceExistException();
    }
    // 获取注册设备页面的所有设备信息
    public function getAllDeviceInfo(){
        $request = Request::instance();
        $params = $request->only(['msgId']);
        $msgId = $params['msgId'];
        $allDeviceInfo = (new self)->order('device_id asc')->select();
        if(!$allDeviceInfo){
            throw new DeviceExistException(['msg'=>'没找到设备信息']);
        }
        foreach ($allDeviceInfo as $data){
            $data->save(['msgId'=>$msgId]);
        }
        return $allDeviceInfo;
    }
    // 更新注册设备信息
    public function putDeviceInfo(){
        $request = Request::instance();
        $params = $request->only(['msgId','deviceID','deviceMAC','versionID','manufacturerID']);
        $msgId = $params['msgId'];
        $deviceID = $params['deviceID'];
        $deviceMAC = $params['deviceMAC'];
        $manufacturerID = $params['manufacturerID'];
        $versionID = $params['versionID'];
        $deviceInfoByID = (new self)->where('device_id','=',$deviceID)->find();
        if($deviceInfoByID){
            $orderID = DeviceInfo::hasWhere('manufacturerInfo',['order_id'=>$manufacturerID])
                ->find();
            if($orderID) {
                $deviceInfoByID->save(['msgId' => $msgId], ['device_id' => $deviceID]);
                $deviceInfoByID->save(['manufacturer_id' => $manufacturerID], ['device_id' => $deviceID]);
                $deviceInfoByID->save(['device_mac' => $deviceMAC], ['device_id' => $deviceID]);
                $deviceInfoByID->save(['version_id' => $versionID], ['device_id' => $deviceID]);
                return $deviceInfoByID;
            }else{
                throw new ManufacturerExistException(['msg'=>'厂商 ID 不存在']);
            }
        }
        throw new DeviceExistException(['msg'=>'设备编号不存在']);
    }
    // 根据设备 id 和厂商 id 筛选注册设备信息
    public function filterDeviceRegisterInfo(){
        $request = Request::instance();
        $params = $request->only(['msgId','deviceID','manufacturerID']);
        $msgId = $params['msgId'];
        $deviceID = $params['deviceID'];
        $manufacturerID = $params['manufacturerID'];
        $filterDeviceRegisterInfo = (new self)->order('device_id asc')->whereLike('manufacturer_id','%'.$manufacturerID.'%')
            ->whereLike('device_id',$deviceID.'%')->select();
        if(!$filterDeviceRegisterInfo){
            throw new DeviceExistException (['msg'=>'找不到设备注册匹配数据']);
        }
        foreach ($filterDeviceRegisterInfo as $data) {
            $data->save(['msgId' => $msgId]);
        }
        return $filterDeviceRegisterInfo;
    }
    // 删除设备注册信息
    public function deleteDeviceRegisterInfo(){
        $request = Request::instance();
        $params = $request->only(['msgId','deviceID']);
        $msgId = $params['msgId'];
        $deviceID = $params['deviceID'];
        $deviceRegisterByID = (new self)->where('device_id','=',$deviceID)->find();
        if(!$deviceRegisterByID){
            throw new DeviceRegisterDeleteException();
        }
        $deviceRegisterByID->delete();
        return $msgId;
    }

}