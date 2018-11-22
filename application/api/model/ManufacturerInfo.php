<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/26
 * Time: 下午1:32
 */

namespace app\api\model;
use app\lib\exception\ManufacturerDeleteException;
use app\lib\exception\ManufacturerExistException;
use app\lib\exception\ParameterException;
use think\Request;
use traits\model\SoftDelete;

class ManufacturerInfo extends BaseModel
{
    use SoftDelete;
    protected $autoWriteTimestamp = true;
    // 创建厂商信息
    public function postManufacturerInfo(){
        $request = Request::instance();
        $params = $request->only(['notifyAddress','msgId','manufacturerName','manufacturerID']);
        $notifyAddress = $params['notifyAddress'];
        $msgId = $params['msgId'];
        $manufacturerID = $params['manufacturerID'];
        $manufacturerName = $params['manufacturerName'];
        $manufacturerByName = (new self)->where('manufacturer_name','=',$manufacturerName)->find();
        $manufacturerByID = (new self)->where('order_id','=',$manufacturerID)->find();
        if(!$manufacturerByName && !$manufacturerByID){
            $newManufacturer = (new self)->data([
                'manufacturer_name' => $manufacturerName,
                'notify_address' => $notifyAddress,
                'order_id' => $manufacturerID,
                'msgId' => $msgId
            ]);
            $newManufacturer->save();
            return $newManufacturer;
        }
        throw new ManufacturerExistException();
    }
    // 获取所有厂商信息
    public function getAllManufacturerInfo(){
        $request = Request::instance();
        $params = $request->only(['msgId']);
        $msgId = $params['msgId'];
        $allManufacturerInfo = (new self)->order('order_id asc')->select();
        if(!$allManufacturerInfo){
            throw new ParameterException(['msg'=>'找不到厂商数据']);
        }
        foreach ($allManufacturerInfo as $data){
            $data->save(['msgId'=>$msgId]);
        }
        return $allManufacturerInfo;
    }
    //   更新厂商信息
    public function putManufacturerInfo(){
        $request = Request::instance();
        $params = $request->only(['notifyAddress','msgId','manufacturerName','manufacturerID']);
        $notifyAddress = $params['notifyAddress'];
        $msgId = $params['msgId'];
        $manufacturerID = $params['manufacturerID'];
        $manufacturerName = $params['manufacturerName'];
        $manufacturerByID = (new self)->where('order_id','=',$manufacturerID)->find();
        if($manufacturerByID){
            $manufacturerByID->save(['msgId'=>$msgId],['manufacturer_id'=> $manufacturerID]);
            $manufacturerByID->save(['manufacturer_name'=>$manufacturerName],['manufacturer_id'=> $manufacturerID]);
            $manufacturerByID->save(['notify_address'=>$notifyAddress],['manufacturer_id'=> $manufacturerID]);
            return $manufacturerByID;
        }
        throw new ManufacturerExistException();
    }
    // 删除厂商信息
    public function deleteManufacturerInfo(){
        $request = Request::instance();
        $params = $request->only(['manufacturerID','msgId']);
        $msgId = $params['msgId'];
        $manufacturerID = $params['manufacturerID'];
        $manufacturerByID = (new self)->where('order_id','=',$manufacturerID)->find();
        if(!$manufacturerByID){
            throw new ManufacturerDeleteException();
        }
        $manufacturerByID->delete();
        return $msgId;
    }
    //   根据厂商 id 和厂商名称筛选厂商信息
    public function filterManufacturerInfo(){
        $request = Request::instance();
        $params = $request->only(['manufacturerID','msgId','manufacturerName']);
        $msgId = $params['msgId'];
        $manufacturerID = $params['manufacturerID'];
        $manufacturerName = $params['manufacturerName'];
        $filterManufacturer = (new self)->order('order_id asc')->whereLike('manufacturer_name','%'.$manufacturerName.'%')
            ->whereLike('order_id',$manufacturerID.'%')->select();
        if(!$filterManufacturer){
            throw new ManufacturerExistException (['msg'=>'找不到厂商匹配数据']);
        }
        foreach ($filterManufacturer as $data) {
            $data->save(['msgId' => $msgId]);
        }
        return $filterManufacturer;
    }
}