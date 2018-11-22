<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/17
 * Time: 下午1:47
 */

namespace app\api\controller\v1;

use app\api\service\UserToken;
use app\api\validate\TokenGet;
use app\api\validate\UserInfo;
use app\api\validate\Username;
use app\lib\exception\ParameterException;
use app\lib\exception\UserMissExcepiton;
use app\api\validate\UserLogin;
use app\api\model\User as UserModel;
use app\api\validate\UserLogout;

class User
{
    // 用户登陆查询是否匹配
    public function getUserLogin(){
        (new UserLogin())->goCheck();
        $user = (new UserModel())->getUserLogin();
        if(!$user){
            throw new UserMissExcepiton();
        }else{
            $ut = new UserToken();
            $token = $ut->get($user);
            $userResult = (new UserModel())->putUserInfo($user,$token);
            return $userResult;
        }
    }
    // 用户退出登陆
    public function putUserLogout(){
        (new UserLogout())->goCheck();
        $user = (new UserModel())->putUserLogout();
        if(!$user){
            throw new UserMissExcepiton(['msg'=>'用户名不存在']);
        }
        return $user;
    }
    // 用户注册，查询用户名是否已存在
    public function getUsername(){
        (new Username())->goCheck();
        $user = (new UserModel())->getUsername();
        return $user;
    }
    // 用户注册，提交用户注册信息
    public function postUserInfo(){
        (new UserInfo())->goCheck();
        $user = (new UserModel())->postUserInfo();
        if(!$user){
            throw new ParameterException();
        }
        return $user;
    }
}