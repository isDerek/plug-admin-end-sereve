<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/11/5
 * Time: 上午10:49
 */

namespace app\api\service;

use app\api\model\User as UserModel;
use app\api\model\User;
use app\lib\enum\ScopeEnum;
use app\lib\exception\TokenException;
use app\lib\exception\UserMissExcepiton;

class UserToken extends Token {

    public function get($userResult){
        return $this->grantToken($userResult);
    }
    private function grantToken($userResult){
        $id = $userResult['id'];
        $user = (new UserModel())->getByID($id);
        if ($user){
            $uid = $user->id;
        }else{
            throw new UserMissExcepiton();
        }
        $cachedValue = $this->prepareCachedValue($userResult,$uid);
        $token =  self::saveToCache($cachedValue);
        return $token;
    }
    private function saveToCache($cachedValue){
        $key = self::generateToken();
        $value = json_encode($cachedValue);
        $expire_in = config('setting.token_expire_in');

        $request = cache($key, $value, $expire_in);
        if(!$request){
            throw new TokenException([
                'msg' => '服务器缓存异常',
                'errorCode' => 10005
            ]);
        }
        return $key;
    }
    private function prepareCachedValue($userResult, $uid){
        $cachedValue = $userResult;
        $cachedValue['uid'] = $uid;
        // scope = 16 等于 app 用户的权限
        $cachedValue['scope'] = ScopeEnum::USER;
        // scope = 32 等于 CMS 用户的权限
        return $cachedValue;
    }
}