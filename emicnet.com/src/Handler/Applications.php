<?php

namespace jzweb\voip\emicnet\Handler;

use jzweb\voip\emicnet\Exception\ClientException;
use jzweb\voip\emicnet\Handler\BaseRequest;

/**
 * 应用中心
 *
 * Class Applications
 * @package jzweb\voip\emicnet\Handler
 */
class Applications extends BaseRequest
{
    /**
     * 构造函数
     * Applications constructor.
     * @param $config
     */
    public function __construct($config)
    {
        parent::__construct($config);
    }


    /**
     * 创建子账号
     *
     * @param string $appId 应用ID
     * @param string $nickName 子账号昵称
     * @param string $mobile 子账号用户手机号码
     * @param string $email 子账号用户邮件地址
     *
     * @return array|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createSubAccount($appId, $nickName = "", $mobile = "", $email = "")
    {
        if (!$appId) {
            return ['return_code' => "FAIL", 'return_msg' => "appId输入不能为空"];
        }

        return $this->httpRequest->apiPost("Applications/createSubAccount", [
            'appId' => $appId,
            'nickName' => $nickName,
            'mobile' => $mobile,
            'email' => $email
        ], false);

    }


    /**
     * 下载应用话单
     *
     * 用户可通过本接口下载以下话单：
     * 1) 用户应用程序通过 API 接口发出的呼叫；
     * 2) 用户应用程序子账户所属云总机企业内发生的所有呼入和呼出。
     * 应用话单每次返回的话单数目由接口参数 maxNumber 指定，maxNumber 的
     * 范围为 1-500，并且每次最多只给出 7 天内的记录。因此，如果指定时间范围内
     * 的话单超过 500 条，就需要调整 startTime，并多次调用本接口，才能获得所有话单
     * 话单中每个通话都有一个唯一的 callId，可以通过这个 callId 获取通话详情和通话录音
     * 用户不能频繁调用该接口，默认一分钟调用一次
     *
     * @param string $subAccountSid 子账号ID
     * @param datetime $startTime 话单开始时间
     * @param datetime $endTime 话单结束时间
     * @param string $lastMaxId 上次返回话单中的 billId 最大值
     * @param int $maxNumber 本次调用返回的最大话单数，范围 1-500，默认为 100
     *
     * @return array
     */
    public function billList($subAccountSid, $startTime, $endTime, $lastMaxId = "", $maxNumber = 100)
    {
        //开始时间
        if (!$startTime) {
            return ['return_code' => "FAIL", 'return_msg' => "话单开始时间不允许为空"];
        }
        //结束时间
        if (!$endTime) {
            return ['return_code' => "FAIL", 'return_msg' => "话单结束时间不允许为空"];
        }
        //开始时间不能大于结束时间
        if (strtotime($startTime) > strtotime($endTime)) {
            return ['return_code' => "FAIL", 'return_msg' => "话单结束时间不能小雨开始时间"];
        }
        //每次只允许查询7天数据
        if ((strtotime($endTime) - strtotime($startTime)) / (3600 * 24) > 7) {
            return ['return_code' => "FAIL", 'return_msg' => "每次最多只允许查询7天的话单数据"];
        }
        //判断返回的话单条目数
        if ($maxNumber > 500) {
            return ['return_code' => "FAIL", 'return_msg' => "每次最多允许返回的话单条目数不允许超过500"];
        }
        return $this->httpRequest->apiPost("Applications/billList", [
            'subAccountSid' => $subAccountSid,
            'startTime' => date("YmdHis", strtoupper($startTime)),
            'endTime' => date("YmdHis", strtoupper($endTime)),
            'lastMaxId' => $lastMaxId,
            'maxNumber' => $maxNumber
        ], false);
    }

    /**
     * 获取指定话单详情
     *
     * 通过调用本接口，以 callId 为输入参数，获取本次呼叫详情。callId 唯一标识
     * 一次通话，获取途径有：
     *  1) 调用 API 通话接口（包括呼叫中心通话接口）成功后，会同步返回 callId；
     *  2) 应用服务器通过接受来自 API 平台的话单推送，也可以获取 callId；
     *  3) 通过下载应用话单接口，也可以获取 callId。
     *
     * @param string $callId 呼叫ID
     * @return array
     */
    public function callDetail($callId)
    {
        if (!$callId) {
            return ['return_code' => "FAIL", 'return_msg' => "呼叫ID输入不能为空"];
        } else {
            return $this->httpRequest->apiPost("Applications/callDetail", ['callId' => $callId], false);
        }
    }


    /**
     * 获取通话录音文件URL
     *
     * 在查询通话录音文件 Url 之前，首先必须下载应用话单（见 3.7），然后根
     * 据应用话单中的参数 callId 和 subAccountSid 获取下载 URL。
     * 特别说明：出于安全性考虑，这里获得的下载 URL 是临时性的，默认有效期
     * 2 小时。超时后，URL 就可能会无效，无法再用来下载录音。因此，每次下载录
     * 音之前，都必须通过本接口重新获取 URL。
     * 通过 HTTPS POST 方式提交要求。
     *
     * @param string $callId 呼叫ID
     *
     * @return array
     */
    public function callRecordUrl($callId)
    {
        if (!$callId) {
            return ['return_code' => "FAIL", 'return_msg' => "呼叫ID输入不能为空"];
        } else {
            return $this->httpRequest->apiPost("Applications/callRecordUrl", ['callId' => $callId], false);
        }
    }


}