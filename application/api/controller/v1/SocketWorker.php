<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/11/14
 * Time: 11:37 AM
 */

namespace app\api\controller\v1;


use think\worker\Server;
//require_once __DIR__ . '../../../../vendor/workerMan/workerMan/Autoloader.php';


class SocketWorker extends Server
{
    protected $socket = 'websocket://0.0.0.0:2346';

    /**
     * 收到信息
     * @param $connection
     * @param $data
     */
    public function onMessage($connection, $data)
    {
        $connection->send('我收到你的信息了');
    }

    /**
     * 当连接建立时触发的回调函数
     * @param $connection
     */
    public function onConnect($connection)
    {

    }

    /**
     * 当连接断开时触发的回调函数
     * @param $connection
     */
    public function onClose($connection)
    {

    }
    /**
     * 当客户端的连接上发生错误时触发
     * @param $connection
     * @param $code
     * @param $msg
     */
    public function onError($connection, $code, $msg)
    {
        echo "error $code $msg\n";
    }

    /**
     * 每个进程启动
     * @param $worker
     */
    public function onWorkerStart($worker)
    {

    }
}