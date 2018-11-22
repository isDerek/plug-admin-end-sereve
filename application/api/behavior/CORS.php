<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/18
 * Time: 下午12:08
 */

namespace app\api\behavior;

class CORS
{
    public function appInit(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: token, Origin, X-Requested-With, Content-Type, Accept, Authorization");
        header('Access-Control-Allow-Methods: POST,GET,PUT,DELETE');

        if(request()->isOptions()){
            exit();
        }
    }
}