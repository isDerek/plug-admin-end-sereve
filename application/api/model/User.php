<?php
/**
 *
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/18
 * Time: 上午8:38
 */
namespace app\api\model;

use app\lib\exception\UserMissExcepiton;
use think\Request;

class user extends BaseModel
{
    protected $autoWriteTimestamp = true;
    // 获取用户登陆
    public function getUserLogin(){
        $request = Request::instance();
        $params = $request->only(['username','password','msgId']);
        $username = $params['username'];
        $password = $params['password'];
        $msgId = $params['msgId'];
        $user = (new self)->where('username','=',$username)->where('password','=',$password)->find();
        $user->save(['msgId'=>$msgId],['username'=> $username]);
        $user->save(['status'=>1],['username'=>$username]);
        return $user;
    }
    // 保存用户 token 和用户权限 scope
    public function putUserInfo($userResult,$token){
        $scope = $userResult['scope'];
        $username = $userResult['username'];
        $user = (new self)->where('username','=',$username)->find();
        $user->save(['scope'=>$scope],['username'=>$username]);
        $user->save(['token'=>$token],['username'=>$username]);
        return $user;
    }
    // 用户退出
    public function putUserLogout(){
        $request = Request::instance();
        $params = $request->only(['username','msgId']);
        $username = $params['username'];
        $msgId = $params['msgId'];
        $user = (new self)->where('username','=',$username)->find();
        $user->save(['msgId'=>$msgId],['username'=> $username]);
        $user->save(['status'=>0],['username'=>$username]);
        return $user;
    }
    // 注册用户
    public function postUserInfo(){
        $request = Request::instance();
        $params = $request->only(['username','password','phone','email','confirmPassword','msgId']);
        $username = $params['username'];
        $password = $params['password'];
        $email = $params['email'];
        $phone = $params['phone'];
        $msgId = $params['msgId'];
        $confirmPassword = $params['confirmPassword'];
        $user = (new self)->data([
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'phone' => $phone,
            'confirmPassword' => $confirmPassword,
            'msgId' => $msgId
        ]);
        $user->save();
        return $user;
    }
    // 注册用户中的查询用户名是否存在
    public function getUsername(){
        $request = Request::instance();
        $params = $request->only(['username','msgId']);
        $username = $params['username'];
        $msgId = $params['msgId'];
        $user = (new self)->where('username','=',$username)->find();
        if(!$user){
            throw new UserMissExcepiton(['msg'=>'用户名不存在']);
        }
        $user->save(['msgId'=>$msgId],['username'=> $username]);
        return $user;
    }

    public function getByID($id){
        $user = (new self)->where('id','=',$id)
            ->find();
        return $user;
    }
}
