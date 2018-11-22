<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/11/2
 * Time: 上午11:02
 */

namespace app\api\model;


use think\Request;
use traits\model\SoftDelete;

class DeviceStatus extends BaseModel
{
    protected $autoWriteTimestamp = true;
    use SoftDelete;
    // 创建设备状态，根据注册设备信息进行创建
    public function postDeviceStatusInfo(){

    }
    // 获取所有设备状态
    public function getAllDeviceStatusInfo(){
        $request = Request::instance();
        $params = $request->only(['msgId']);
        $msgId = $params['msgId'];
        $allDeviceStatusInfo = (new self)->order('device_id asc')->select();
        if(!$allDeviceStatusInfo){
            throw new DeviceExistException(['msg'=>'没找到设备信息']);
        }
        foreach ($allDeviceStatusInfo as $data){
            $data->save(['msgId'=>$msgId]);
        }
        return $allDeviceStatusInfo;
    }
}