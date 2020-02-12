<?php

namespace jzweb\voip\emicnet;


use jzweb\voip\emicnet\Handler\Applications;
use jzweb\voip\emicnet\Handler\CallCenter;

/**
 * 南京易米呼叫云客户端
 *
 * Class client
 * @package jzweb\sat\ccbll
 */
class Client
{
    private $config;
    private $applications;
    private $callCenter;

    /**
     * 构造函数
     *
     * client constructor.
     * @param $config
     */
    public function __construct($config)
    {
        $this->config = $config;
        $this->applications = new Applications($this->config);
        $this->callCenter = new CallCenter($this->config);
    }

    /**
     * 下载应用话单
     *
     * @param string $subAccountSid
     * @param datetime $startTime
     * @param datetime $endTime
     * @param string $lastMaxId
     * @param int $maxNumber
     * @return mixed
     */
    public function billList($subAccountSid, $startTime, $endTime, $lastMaxId = "", $maxNumber = 100)
    {
        return $this->applications->billList($subAccountSid, $startTime, $endTime, $lastMaxId, $maxNumber);
    }

    /**
     * 获取指定话单详情
     *
     * @param string $callId
     * @return mixed
     */
    public function callDetail($callId)
    {
        return $this->applications->callDetail($callId);
    }

    /**
     * 获取通话录音文件URL
     *
     * @param string $callId
     * @return mixed
     */
    public function callRecordUrl($callId)
    {
        return $this->applications->callRecordUrl($callId);
    }


    /**
     * 坐席签入
     *
     * @param string $workNumber
     * @param int $gid
     * @param int $type
     * @param string $deviceNumber
     * @return mixed
     */
    public function signIn($workNumber, $gid = 0, $type = 0, $deviceNumber = "")
    {
        return $this->callCenter->signIn($workNumber, $gid, $type, $deviceNumber);
    }

    /**
     * 坐席签出
     *
     * @param string $workNumber
     * @return mixed
     */
    public function signOff($workNumber)
    {
        return $this->callCenter($workNumber);
    }

    /**
     * 改变坐席模式
     *
     * @param string $workNumber
     * @param int $mode
     * @param string $deviceNumber
     * @return mixed
     */
    public function changeMode($workNumber, $mode = 0, $deviceNumber = "")
    {
        return $this->callCenter->changeMode($workNumber, $mode, $deviceNumber);
    }

    /**
     * 改变坐席状态
     *
     * @param string $workNumber
     * @param int $status
     * @return mixed
     */
    public function changeStatus($workNumber, $status = 0)
    {
        return $this->callCenter->changeStatus($workNumber, $status);
    }

    /**
     * 坐席呼出
     *
     * @param string $workNumber
     * @param string $to
     * @param string $outNumber
     * @param int $displayMode
     * @param string $userData
     * @return mixed
     */
    public function callOut($workNumber, $to, $outNumber = "", $displayMode = 0, $userData = "ds")
    {
        return $this->callCenter->callOut($workNumber, $to, $outNumber, $displayMode, $userData);
    }

    /**
     * 挂断电话
     *
     * @param string $workNumber
     * @param string $callId
     * @return mixed
     */
    public function callCancel($workNumber, $callId)
    {
        return $this->callCenter->callCancel($workNumber, $callId);
    }


}
