<?php

namespace jzweb\voip\emicnet;


use jzweb\voip\emicnet\Handler\Applications;
use jzweb\voip\emicnet\Handler\CallCenter;
use jzweb\voip\emicnet\Handler\Enterprises;

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
    private $enterprises;

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
        $this->enterprises = new Enterprises($this->config);
    }

    /**
     * 创建子账号
     *
     * @param string $appId
     * @param string $nickName
     * @param string $mobile
     * @param string $email
     * @return array|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createSubAccount($appId, $nickName = "", $mobile = "", $email = "")
    {
        return $this->applications->createSubAccount($appId, $nickName, $mobile, $email);
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
        return $this->callCenter->signOff($workNumber);
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

    /**
     * 绑定云总计
     *
     * @param string $appId
     * @param string $switchNumber
     * @param string $number
     * @param string $password
     * @param int $chargeMode
     * @param string $userData
     * @param string $callreqUrl
     * @return EntityReport|mixed
     */
    public function addEnterprise($appId, $switchNumber, $number, $password, $chargeMode = 0, $userData = "", $callreqUrl = "")
    {
        return $this->enterprises->addEnterprise($appId, $switchNumber, $number, $password, $chargeMode, $userData, $callreqUrl);
    }

    /**
     * 创建企业用户
     *
     * @param string $appId
     * @param string $phone
     * @param string $workNumber
     * @param string $displayName
     * @param string $directNumber
     * @param string $callTime
     * @param string $password
     * @param string $number
     * @return array|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createUser($appId, $phone, $workNumber = "", $displayName = "", $directNumber = "", $callTime = "", $password = "", $number = "")
    {
        return $this->enterprises->createUser($appId, $phone, $workNumber, $displayName, $directNumber, $callTime, $password, $number);
    }

    /**
     * 更新企业用户工号
     *
     * @param string $appId
     * @param string $number
     * @param string $workNumber
     * @return array|mixed
     */
    public function updateWorkNumber($appId, $number, $workNumber)
    {
        return $this->enterprises->updateWorkNumber($appId, $number, $workNumber);
    }


}
