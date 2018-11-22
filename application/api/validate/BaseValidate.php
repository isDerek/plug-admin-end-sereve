<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/17
 * Time: 下午1:57
 */

namespace app\api\validate;

use app\lib\exception\ParameterException;
use think\Validate;
use think\Request;

class BaseValidate extends Validate
{
    public function goCheck()
    {
        // 获取 http 传入的参数
        // 对这些参数做校验
        $request = Request::instance();
        $params = $request->param();
        // this 指的是 validate ，因为继承在 validate 里面
        $result = $this->batch()->check($params);
        if (!$result) {
            $e = new ParameterException([
                'msg' => $this->error
            ]);
            throw $e;
        } else {
            return true;
        }
    }
}